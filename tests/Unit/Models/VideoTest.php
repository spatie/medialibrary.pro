<?php

namespace Tests\Models;

use App\Http\App\Controllers\Videos\VideosController;
use App\Models\Chapter;
use App\Models\Video;
use Tests\TestCase;
use Vimeo\Laravel\Facades\Vimeo;

class VideoTest extends TestCase
{
    private Video $video1;
    private Video $video2;
    private Video $video3;

    protected function setUp(): void
    {
        parent::setUp();

        $chapter = factory(Chapter::class)->create();

        $this->video1 = factory(Video::class)->create(['chapter_id' => $chapter->id, 'sort' => 0]);
        $this->video2 = factory(Video::class)->create(['chapter_id' => $chapter->id, 'sort' => 1]);
        $this->video3 = factory(Video::class)->create(['chapter_id' => $chapter->id, 'sort' => 2]);
    }

    /** @test */
    public function it_can_get_its_url()
    {
        $this->assertEquals(action([VideosController::class, 'show'], [$this->video1->chapter, $this->video1]), $this->video1->getUrlAttribute());
        $this->assertEquals(action([VideosController::class, 'show'], [$this->video1->chapter, $this->video1]), $this->video1->url);
    }

    /** @test */
    public function it_can_get_the_previous_and_next_videos()
    {
        $this->assertNull($this->video1->getPreviousVideo());
        $this->assertTrue($this->video1->is($this->video2->getPreviousVideo()));
        $this->assertTrue($this->video3->is($this->video2->getNextVideo()));
        $this->assertNull($this->video3->getNextVideo());
    }

    /** @test */
    public function it_can_get_the_download_urls()
    {
        Vimeo::shouldReceive('request')
            ->with('/videos/'.$this->video1->vimeo_id, [], 'GET')
            ->andReturn([
                'body' => [
                    'download' => [
                        ['quality' => 'hd', 'link' => 'hd-link', 'size' => 100],
                        ['quality' => 'sd', 'link' => 'sd-link', 'size' => 50],
                    ]
                ]
            ])->once();

        $this->assertEquals('hd-link', $this->video1->getDownloadHdUrlAttribute());
        $this->assertEquals('hd-link', $this->video1->downloadHdUrl);
        $this->assertEquals('sd-link', $this->video1->getDownloadSdUrlAttribute());
        $this->assertEquals('sd-link', $this->video1->downloadSdUrl);

        $this->assertEquals(100, $this->video1->getDownloadHdSizeAttribute());
        $this->assertEquals(100, $this->video1->downloadHdSize);
        $this->assertEquals(50, $this->video1->getDownloadSdSizeAttribute());
        $this->assertEquals(50, $this->video1->downloadSdSize);
    }
}
