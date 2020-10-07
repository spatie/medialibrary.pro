<?php

namespace Tests\Feature;

use App\Http\Front\Controllers\DownloadLatestController;
use App\Models\License;
use Tests\TestCase;

class DownloadLatestTest extends TestCase
{
    /** @test */
    public function it_can_download_the_latest_version()
    {
        $this->withoutExceptionHandling();

        $license = License::factory()->create();

        /** @var \Illuminate\Foundation\Testing\TestResponse $response */
        $response = $this
            ->get(action(DownloadLatestController::class, $license))
            ->assertRedirect();

        $redirectTo = $response->headers->get('location');

        $this->assertEquals(1, $license->refresh()->mailcoach_download_count);
        $this->assertStringContainsString('mailcoach.s3.eu-west-1.amazonaws.com', $redirectTo);
    }
}
