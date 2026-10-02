<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;

/**
 * Demo uploads are removed together with their models after ten minutes. Files whose models
 * are gone in another way (the SQLite database is recreated on every deploy) are removed here
 * by age, so the media bucket never keeps growing.
 */
class DeleteOldMediaFilesCommand extends Command
{
    protected $signature = 'delete-old-media-files {--minutes=15}';

    protected $description = 'Delete files on the media disk that are older than the given number of minutes';

    public function handle(): int
    {
        $disk = Storage::disk(config('media-library.disk_name'));

        $cutOffTimestamp = now()->subMinutes((int) $this->option('minutes'))->getTimestamp();

        $deletedPaths = collect($disk->listContents('', deep: true))
            ->filter(fn (StorageAttributes $attributes) => $attributes->isFile())
            ->reject(fn (StorageAttributes $attributes) => str_starts_with(basename($attributes->path()), '.'))
            ->filter(fn (StorageAttributes $attributes) => $attributes->lastModified() < $cutOffTimestamp)
            ->map(fn (StorageAttributes $attributes) => $attributes->path())
            ->values();

        if ($deletedPaths->isNotEmpty()) {
            $disk->delete($deletedPaths->all());
        }

        $this->info("Deleted {$deletedPaths->count()} old media files.");

        return self::SUCCESS;
    }
}
