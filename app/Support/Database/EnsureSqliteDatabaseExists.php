<?php

namespace App\Support\Database;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * The demo data only needs to live for a few minutes, so the app runs on an SQLite file on the
 * ephemeral disk of its single replica. When that file is missing (after a deploy, a restart or
 * a wake from hibernation) it gets created and migrated before the app touches the database.
 *
 * The migrations run against a temporary file that is renamed into place afterwards, so other
 * requests never see a half migrated database.
 */
class EnsureSqliteDatabaseExists
{
    public function __invoke(string $connectionName = 'sqlite'): void
    {
        $databasePath = config("database.connections.{$connectionName}.database");

        if (! $this->shouldCreate($connectionName, $databasePath)) {
            return;
        }

        if (File::exists($databasePath)) {
            return;
        }

        File::ensureDirectoryExists(dirname($databasePath));

        $lock = fopen("{$databasePath}.lock", 'c');

        flock($lock, LOCK_EX);

        try {
            if (! File::exists($databasePath)) {
                $this->createAndMigrate($connectionName, $databasePath);
            }
        } finally {
            flock($lock, LOCK_UN);
            fclose($lock);
        }
    }

    protected function shouldCreate(string $connectionName, ?string $databasePath): bool
    {
        if (! config("database.connections.{$connectionName}.create_when_missing")) {
            return false;
        }

        if (config("database.connections.{$connectionName}.driver") !== 'sqlite') {
            return false;
        }

        return filled($databasePath) && $databasePath !== ':memory:';
    }

    protected function createAndMigrate(string $connectionName, string $databasePath): void
    {
        $temporaryPath = "{$databasePath}.migrating";

        File::put($temporaryPath, '');

        $this->useDatabasePath($connectionName, $temporaryPath);

        try {
            Artisan::call('migrate', ['--database' => $connectionName, '--force' => true]);
        } finally {
            $this->useDatabasePath($connectionName, $databasePath);
        }

        rename($temporaryPath, $databasePath);
    }

    protected function useDatabasePath(string $connectionName, string $databasePath): void
    {
        DB::purge($connectionName);

        config()->set("database.connections.{$connectionName}.database", $databasePath);
    }
}
