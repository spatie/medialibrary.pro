<?php

namespace Tests\Models;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Video;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_check_if_it_has_a_valid_video_license()
    {
        /** @var \App\Models\User $user */
        $user = factory(User::class)->create();

        $this->assertFalse($user->canAccessVideos());

        $standardLicense = factory(Purchase::class)->create([
            'product_id' => factory(Product::class)->create(['type' => Product::TYPE_STANDARD]),
        ]);
        $user->licenses()->save($standardLicense);

        $this->assertTrue($user->canAccessVideos());
    }

    /** @test */
    public function it_can_see_if_it_has_completed_a_video()
    {
        /** @var \App\Models\User $user */
        $user = factory(User::class)->create();
        $video = factory(Video::class)->create();

        $this->assertFalse($user->hasCompletedVideo($video));

        $user->videos()->attach($video);

        $this->assertTrue($user->fresh()->hasCompletedVideo($video));
    }
}
