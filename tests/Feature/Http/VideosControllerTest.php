<?php

namespace Tests\Feature\Http;

use App\Http\App\Controllers\Videos\VideosController;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use Tests\Factories\UserFactory;
use Tests\TestCase;
use Vimeo\Laravel\Facades\Vimeo;

class VideosControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Vimeo::shouldReceive('request')->andReturn([]);

        $this->withExceptionHandling();
    }

    /** @test */
    public function it_can_list_videos()
    {
        $user = (new UserFactory())
            ->withPurchase(Product::TYPE_STANDARD)
            ->create();

        $video = Video::factory()->create();

        $this
            ->actingAs($user)
            ->get(action([VideosController::class, 'index']))
            ->assertSuccessful()
            ->assertViewHas(['chapters'])
            ->assertSee($video->title)
            ->assertSee($video->chapter->title);
    }

    /** @test */
    public function it_can_show_videos()
    {
        $user = (new UserFactory())
            ->withPurchase(Product::TYPE_STANDARD)
            ->create();

        /** @var \App\Models\Video $video */
        $video = Video::factory()->create();

        $this->actingAs($user)->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertSuccessful()
            ->assertViewHas(['currentVideo', 'previousVideo', 'nextVideo', 'chapters'])
            ->assertSee($video->title)
            ->assertSee($video->chapter->title)
            ->assertSee($video->getDownloadHdUrlAttribute())
            ->assertSee($video->getDownloadSdUrlAttribute())
            ->assertSee($video->getUrlAttribute());
    }

    /** @test */
    public function it_doesnt_show_videos_for_guests()
    {
        $video = Video::factory()->create();

        $this->get(action([VideosController::class, 'index']))
            ->assertRedirect('/login');

        $this->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_doesnt_show_videos_if_it_has_no_license()
    {
        $user = User::factory()->create();

        $video = Video::factory()->create();

        $this->actingAs($user)->get(action([VideosController::class, 'index']))
            ->assertUnauthorized();

        $this->actingAs($user)->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertUnauthorized();
    }
}
