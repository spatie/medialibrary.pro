<?php

namespace Tests\Feature;

use App\Http\App\Controllers\Licenses\UpdateLicenseController;
use App\Models\License;
use App\Models\User;
use Tests\TestCase;

class LicenseControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withExceptionHandling();
    }

    /** @test */
    public function it_allows_updating_of_the_domain_of_a_license()
    {
        $user = factory(User::class)->create();
        $license = factory(License::class)->create(['user_id' => $user->id]);

        $this
            ->actingAs($user)
            ->put(action([UpdateLicenseController::class, 'update'], $license), [
                'domain' => 'https://google.com',
            ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertEquals('https://google.com', $license->fresh()->domain);
    }

    /** @test */
    public function it_must_have_an_authenticated_user()
    {
        $user = factory(User::class)->create();
        $license = factory(License::class)->create(['user_id' => $user->id]);

        $this
            ->put(action([UpdateLicenseController::class, 'update'], $license), [
                'domain' => 'https://google.com',
            ])
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_allows_only_owners_of_the_license_to_update()
    {
        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();
        $license = factory(License::class)->create(['user_id' => $user->id]);

        $this
            ->actingAs($anotherUser)
            ->put(action([UpdateLicenseController::class, 'update'], $license), [
                'domain' => 'https://google.com',
            ])
            ->assertForbidden();
    }
}
