<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class LatestVersionControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_the_latest_version()
    {
        $this
            ->get('api/latest-version')
            ->assertSuccessful()
            ->assertJsonStructure(['version', 'released_at']);
    }
}
