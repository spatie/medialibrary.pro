<?php

namespace App\Console;

use App\Models\Chapter;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Vimeo\Laravel\Facades\Vimeo;

class UpdateVideosCommand extends Command
{
    protected $signature = 'app:update-videos';

    protected $description = 'Update the videos with the latest from Vimeo.';

    public function handle()
    {
        $this->info('Start updating videos...');

        $response = Vimeo::request('/me/videos', ['per_page' => 100], 'GET');
        $videos = collect(Arr::get($response, 'body.data'));

        $currentChapterSlugs = array_flip(Chapter::all()->pluck('slug')->toArray());

        foreach (config('videos.chapters') as $sort => $chapter) {
            /** @var Chapter $chapterModel */
            $chapterModel = Chapter::firstOrCreate([
                'slug' => Str::slug($chapter['title']),
            ], [
                'title' => $chapter['title'],
                'sort' => $sort,
            ]);

            $currentVideoSlugs = array_flip($chapterModel->videos->pluck('slug')->toArray());

            foreach ($chapter['videos'] as $videoSort => $video_id) {
                $video = $videos->first(fn ($video) => $video['uri'] === '/videos/'.$video_id);
                $slug = Str::slug($video['name']);

                $this->comment("Imported Video: {$video['name']}");
                $chapterModel->videos()->updateOrCreate([
                    'vimeo_id' => $video_id,
                ], [
                    'slug' => $slug,
                    'title' => $video['name'],
                    'description' => $video['description'],
                    'sort' => $videoSort,
                    'runtime' => $video['duration'],
                    'thumbnail' => $video['pictures']['sizes'][1]['link'],
                ]);

                unset($currentVideoSlugs[$slug]);
            }

            unset($currentChapterSlugs[$chapterModel->slug]);

            $chapterModel->videos()->whereIn('slug', array_flip($currentVideoSlugs))->delete();
        }

        Chapter::whereIn('slug', array_flip($currentChapterSlugs))->delete();

        $this->info('All done!');
    }
}
