<?php

namespace Tests\Feature\Console;

use App\Console\UpdateVideosCommand;
use App\Models\Chapter;
use App\Models\Video;
use Tests\TestCase;
use Vimeo\Laravel\Facades\Vimeo;

class UpdateVideosCommandTest extends TestCase
{
    /** @test */
    public function it_adds_new_chapters_and_videos()
    {
        config()->set('videos.chapters', [
            [
                'title' => 'Using Mailcoach',
                'videos' => [
                    378745969,
                ]
            ],
        ]);

        Vimeo::shouldReceive('request')
            ->with('/me/videos', ['per_page' => 100], 'GET')
            ->andReturn([
                'body' => [
                    'data' => [
                        [
                            'uri' => '/videos/378745969',
                            'name' => 'A test video',
                            'description' => 'A video description',
                            'duration' => '330',
                            'pictures' => [
                                'sizes' => [
                                    1 => ['link' => 'https://placehold.it/300x300']
                                ]
                            ]
                        ]
                    ]
                ]
            ])
            ->once();

        $this->assertEquals(0, Chapter::count());
        $this->assertEquals(0, Video::count());

        $this->artisan(UpdateVideosCommand::class)
            ->expectsOutput('Start updating videos...')
            ->expectsOutput('Imported Video: A test video')
            ->expectsOutput('All done!')
            ->assertExitCode(0)
            ->execute();

        $this->assertEquals(1, Chapter::count());
        $this->assertEquals(1, Video::count());

        tap(Chapter::first(), function (Chapter $chapter) {
            $this->assertEquals('Using Mailcoach', $chapter->title);
        });

        tap(Video::first(), function (Video $video) {
            $this->assertEquals('A test video', $video->title);
            $this->assertEquals('A video description', $video->description);
            $this->assertEquals(330, $video->runtime);
            $this->assertEquals(0, $video->sort);
            $this->assertEquals('https://placehold.it/300x300', $video->thumbnail);
        });
    }

    /** @test */
    public function it_deletes_chapters_and_videos_that_dont_exist_anymore()
    {
        factory(Video::class)->create();

        config()->set('videos.chapters', []);

        $this->assertEquals(1, Chapter::count());
        $this->assertEquals(1, Video::count());

        $this->artisan(UpdateVideosCommand::class)
            ->expectsOutput('Start updating videos...')
            ->expectsOutput('All done!')
            ->assertExitCode(0)
            ->execute();

        $this->assertEquals(0, Chapter::count());
        $this->assertEquals(0, Video::count());
    }
}
