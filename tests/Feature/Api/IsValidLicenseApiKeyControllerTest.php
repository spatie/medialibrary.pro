<?php

namespace Tests\Feature\Api;

use App\Http\Api\Controllers\Satis\IsValidLicenseApiKeyController;
use App\Models\License;
use Tests\TestCase;

class IsValidLicenseApiKeyControllerTest extends TestCase
{
    /** @test */
    public function it_will_return_200_if_the_key_is_valid()
    {
        $license = License::factory()->create();

        $basicAuth = base64_encode("{$license->key}:{$license->key}");

        $this
            ->postJson(action(IsValidLicenseApiKeyController::class), [], ['Authorization' => "Basic {$basicAuth}"])
            ->assertStatus(200)
            ->assertSee('valid license');
    }

    /** @test */
    public function it_will_return_401_unauthorized_if_the_key_is_invalid()
    {
        $this->withExceptionHandling();

        $this
            ->postJson(action(IsValidLicenseApiKeyController::class), [], ['Authorization' => "Basic invalid"])
            ->assertUnauthorized()
            ->assertDontSee('valid license');
    }

    /** @test */
    public function it_will_return_401_unauthorized_if_the_key_is_missing()
    {
        $this->withExceptionHandling();

        $this
            ->postJson(action(IsValidLicenseApiKeyController::class))
            ->assertUnauthorized()
            ->assertDontSee('valid license');
    }
}
