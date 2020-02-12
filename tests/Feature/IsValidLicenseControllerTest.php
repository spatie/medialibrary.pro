<?php

namespace Tests\Feature;

use App\Http\Front\Controllers\IsValidLicenseController;
use App\Models\License;
use Tests\TestCase;

class IsValidLicenseControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withExceptionHandling();
    }

    /** @test */
    public function it_will_return_200_if_the_license_is_valid()
    {
        $license = factory(License::class)->create();

        $this
            ->get(action(IsValidLicenseController::class, $license))
            ->assertStatus(200)
            ->assertSee('OK');
    }

    /** @test */
    public function it_will_return_404_if_the_license_is_invalid()
    {
        $this
            ->get(action(IsValidLicenseController::class, 123))
            ->assertNotFound();
    }

    /** @test */
    public function it_will_return_401_if_the_license_is_expired()
    {
        $license = factory(License::class)->create([
            'expires_at' => now()->subWeek(),
        ]);
        $this
            ->get(action(IsValidLicenseController::class, $license))
            ->assertStatus(401);
    }
}
