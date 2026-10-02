<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;

/**
 * Demo uploads are removed together with their models by the daily cleanup. Files whose models
 * are gone in another way (the SQLite database is recreated whenever the instance starts) are
 * removed here by age, so the media bucket never keeps growing. The default age is longer than
 * the gap between the model cleanup and this command, so files of models that survived the model
 * cleanup are kept.
 */
class DeleteOldMediaFilesCommand extends Command
{
    protected $signature = 'delete-old-media-files {--minutes=30}';

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
