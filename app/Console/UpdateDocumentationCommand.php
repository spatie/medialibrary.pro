<?php

namespace App\Console;

use \Symfony\Component\Finder\SplFileInfo;
use App\Models\DocumentationPage;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Symfony\Component\Finder\Finder;
use ZipArchive;

class UpdateDocumentationCommand extends Command
{
    protected $signature = 'app:update-docs';

    protected $description = 'Update the documentation with the latest version on GitHub.';

    private ?TemporaryDirectory $temporaryDirectory = null;

    public function handle()
    {
        $this->temporaryDirectory = new TemporaryDirectory('/tmp/' . Str::random());

        $this->info('Start updating docs...');

        $this->comment('Copying docs zip from GitHub...');
        $localZipFile = $this->copyZipFromGitHub();

        $this->comment('Extracting docs...');
        $localDocsPath = $this->extractDocs($localZipFile);

        $this->comment('Syncing docs with db...');
        $this->syncDocsWithDb($localDocsPath);

        $this->info('All done!');
    }

    protected function copyZipFromGitHub(): string
    {
        $gitHubZip = fopen("https://github.com/spatie/laravel-medialibrary/zipball/master", 'rb');

        $localZipPath = $this->temporaryDirectory->path('docs.zip');
        touch($localZipPath);
        $localZip = fopen($localZipPath, 'wb');

        stream_copy_to_stream($gitHubZip, $localZip);

        fclose($gitHubZip);
        fclose($localZip);

        return $localZipPath;
    }

    private function extractDocs(string $localZipFile): string
    {
        $pathToUnzippedRepo = $this->temporaryDirectory->path('unzipped');

        $zip = new ZipArchive();

        $zip->open($localZipFile);

        $zip->extractTo($pathToUnzippedRepo);

        $zip->close();

        return $this->getPathToUnzippedDocs($pathToUnzippedRepo);
    }

    private function getPathToUnzippedDocs(string $pathToUnzippedRepo): string
    {
        $directories = iterator_to_array((new Finder())->directories()->depth(0)->in($pathToUnzippedRepo)->filter(function (SplFileInfo $file) {
            return Str::startsWith($file->getFilename(), 'spatie-laravel-medialibrary');
        }));

        return array_key_first($directories) . '/docs/';
    }

    private function syncDocsWithDb(string $localDocsPath)
    {
        $finder = (new Finder())->in($localDocsPath)->files();

        $files = iterator_to_array($finder);

        collect($files)->each(function (SplFileInfo $fileInfo) {
            if (Str::contains($fileInfo->getExtension(), ['png', 'jpg', 'jpeg', 'gif', 'svg'])) {
                return;
            }

            $key = 'docs/' . Str::before($fileInfo->getRelativePathname(), '.md');

            $content = file_get_contents($fileInfo->getPathname());

            DocumentationPage::updateOrCreate(
                compact('key'),
                compact('content')
            );
        });
    }
}
