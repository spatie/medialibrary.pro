<?php

namespace Tests\Feature\Http;

use App\Http\App\Controllers\Videos\VideoCompletionController;
use App\Models\License;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Video;
use Tests\TestCase;

class VideoCompletionControllerTest extends TestCase
{
    private User $user;
    private Purchase $purchase;
    private Video $video;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withExceptionHandling();

        $this->user = factory(User::class)->create();
        $this->purchase = factory(Purchase::class)->make([
            'product_id' => factory(Product::class)->create(['type' => Product::TYPE_STANDARD])
        ]);

        $this->user->licenses()->save($this->purchase);

        $this->video = factory(Video::class)->create();
    }

    /** @test */
    public function it_can_record_a_video_completion()
    {
        $this->assertEquals(0, $this->user->videos()->count());

        $this
            ->actingAs($this->user)
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertRedirect();

        $this->assertEquals(1, $this->user->videos()->count());
    }

    /** @test */
    public function it_wont_record_a_completion_twice()
    {
        $this->assertEquals(0, $this->user->videos()->count());

        $this
            ->actingAs($this->user)
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertRedirect();

        $this
            ->actingAs($this->user)
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertRedirect();

        $this->assertEquals(1, $this->user->videos()->count());
    }

    /** @test */
    public function it_wont_let_guests_record_completions()
    {
        $this->withExceptionHandling();

        $this
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_needs_a_license_to_record_a_completion()
    {
        Purchase::truncate();
        License::truncate();

        $this
            ->actingAs($this->user)
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertUnauthorized();
    }

    /** @test */
    public function it_can_remove_a_completion()
    {
        $this->assertEquals(0, $this->user->videos()->count());

        $this
            ->actingAs($this->user)
            ->post(action([VideoCompletionController::class, 'store'], [$this->video]))
            ->assertRedirect();

        $this->assertEquals(1, $this->user->videos()->count());

        $this
            ->actingAs($this->user)
            ->delete(action([VideoCompletionController::class, 'destroy'], [$this->video]))
            ->assertRedirect();

        $this->assertEquals(0, $this->user->videos()->count());
    }
}
