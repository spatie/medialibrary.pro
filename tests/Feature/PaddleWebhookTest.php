<?php

namespace Tests\Feature;

use App\Exceptions\CouldNotHandlePaymentSucceeded;
use App\Models\License;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Support\Paddle\ProcessPaymentSucceededJob;
use Spatie\TestTime\TestTime;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\Models\WebhookCall;
use Tests\TestCase;

class PaddleWebhookTest extends TestCase
{
    /** @var \App\Models\User */
    private $user;

    /** @var \App\Models\Product */
    private $product;

    public function setUp(): void
    {
        parent::setUp();

        TestTime::freeze();

        $this->user = factory(User::class)->create([
            'email' => $this->getWebhookAttributes()['email'],
        ]);
    }

    /** @test */
    public function it_can_process_a_package_purchase_webhook_coming_from_paddle()
    {
        [$product, $webhookAttributes] = $this->getProductAndWebhookAttributesForProduct(Product::TYPE_STANDARD);

        $this
            ->post('paddle-webhooks', $webhookAttributes)
            ->assertSuccessful();

        $this->assertCount(1, License::get());
        $license = License::first();

        $this->assertDatabaseHas('purchases', [
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'license_id' => $license->id,
        ]);

        $this->assertDatabaseHas('licenses', [
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'expires_at' => now()->addYear()->format('Y-m-d H:i:s'),
        ]);
    }

    /** @test */
    public function it_can_process_a_package_renewal_webhook_coming_from_paddle()
    {
        [$license, $product, $webhookAttributes] = $this->getProductAndWebhookAttributesForRenewal(Product::TYPE_STANDARD_RENEWAL);
        $this->assertCount(0, Purchase::all());
        $originalExpiresAt = $license->expires_at;

        $webhookCall = WebhookCall::create(['name' => '', 'payload' => $webhookAttributes]);
        (new ProcessPaymentSucceededJob($webhookCall))->handle();

        $this->assertCount(1, Purchase::all());
        $this->assertDatabaseHas('purchases', [
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'license_id' => $license->id,
        ]);

        $license = $license->refresh();
        $newExpiresAt = $license->expires_at;

        $this->assertEquals(1, $originalExpiresAt->diffInYears($newExpiresAt));
        $this->assertNull($license->expiration_warning_mail_sent_at);
        $this->assertNull($license->expiration_mail_sent_at);
    }

    /** @test */
    public function it_can_process_a_video_purchase_webhook_coming_from_paddle()
    {
        [$product, $webhookAttributes] = $this->getProductAndWebhookAttributesForProduct(Product::TYPE_VIDEOS);
        $this->assertCount(0, Purchase::all());

        $webhookCall = WebhookCall::create(['name' => '', 'payload' => $webhookAttributes]);
        (new ProcessPaymentSucceededJob($webhookCall))->handle();

        $this->assertCount(1, Purchase::all());
        $this->assertDatabaseHas('purchases', [
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'license_id' => null,
        ]);
        $this->assertCount(0, License::all());
    }

    /** @test */
    public function it_will_throw_an_exception_if_passthrough_is_not_found()
    {
        [$license, $product, $webhookAttributes] = $this->getProductAndWebhookAttributesForRenewal(Product::TYPE_STANDARD_RENEWAL);
        $webhookAttributes['passthrough'] = '';

        $webhookCall = WebhookCall::create(['name' => '', 'payload' => $webhookAttributes]);

        $this->expectException(CouldNotHandlePaymentSucceeded::class);

        (new ProcessPaymentSucceededJob($webhookCall))->handle();
    }

    /** @test */
    public function it_will_only_create_one_license_if_a_webhook_with_the_same_alert_id_is_received_twice()
    {
        [$product, $webhookAttributes] = $this->getProductAndWebhookAttributesForProduct(Product::TYPE_STANDARD);

        $this
            ->post('paddle-webhooks', $webhookAttributes)
            ->assertSuccessful();

        $this
            ->post('paddle-webhooks', $webhookAttributes)
            ->assertSuccessful();

        $this->assertCount(1, License::get());
    }

    /** @test */
    public function it_will_not_process_a_webhook_with_an_invalid_signature()
    {
        $this->withoutExceptionHandling();

        $webhookAttributes = $this->getWebhookAttributes();

        $webhookAttributes['p_signature'] = 'invalid-signature';

        $this->expectException(WebhookFailed::class);

        $this->post('paddle-webhooks', $webhookAttributes);
    }

    protected function getProductAndWebhookAttributesForProduct(string $packageType): array
    {
        $webhookAttributes = $this->getWebhookAttributes();

        $product = factory(Product::class)->create([
            'paddle_product_id' => $this->getWebhookAttributes()['product_id'],
            'type' => $packageType,
        ]);

        return [$product, $webhookAttributes];
    }

    protected function getProductAndWebhookAttributesForRenewal(string $packageType): array
    {
        $license = factory(License::class)->create([
            'expires_at' => now()->subWeek(),
            'user_id' => $this->user->id,
            'expiration_warning_mail_sent_at' => now(),
            'expiration_mail_sent_at' => now(),

        ]);

        $webhookAttributes = $this->getWebhookAttributes();

        $webhookAttributes['passthrough'] = json_encode([
            'license' => $license->key,
        ]);

        $product = factory(Product::class)->create([
            'paddle_product_id' => $this->getWebhookAttributes()['product_id'],
            'type' => $packageType,
        ]);

        return [$license, $product, $webhookAttributes];
    }

    protected function getWebhookAttributes()
    {
        return [
            'alert_id' => '712510897',
            'alert_name' => 'payment_succeeded',
            'balance_currency' => 'USD',
            'balance_earnings' => '211.49',
            'balance_fee' => '493.81',
            'balance_gross' => '283.1',
            'balance_tax' => '108.48',
            'checkout_id' => '4-3ffd133587a387c-93a729338b',
            'country' => 'FR',
            'coupon' => 'Coupon 3',
            'currency' => 'GBP',
            'customer_name' => 'customer_name',
            'earnings' => '981.61',
            'email' => 'randy60@example.net',
            'event_time' => '2019-11-03 10:37:53',
            'fee' => '0.34',
            'ip' => '240.99.221.49',
            'marketing_consent' => '',
            'order_id' => '6',
            'passthrough' => 'Example String',
            'payment_method' => 'card',
            'payment_tax' => '0.52',
            'product_id' => '5',
            'product_name' => 'Example String',
            'quantity' => '89',
            'receipt_url' => 'https://my.paddle.com/receipt/1/997772d37154fd9-8879fa78e9',
            'sale_gross' => '228.86',
            'used_price_override' => 'false',
            'p_signature' => 'jeTNp0kG3gwvPfFfTaiSVbKj+ZOCZq2jzCvireS9ftEccgMXyp0LSjUE1fcgMT2nuJBFibC7ihA4A+0U1nf8a6N3S5G5EHv4NVR8rVfEQxY3KAvVALOsm9AXkPq728XY0mFV0sEYKKjsRE7d0n/0GlyiGAREapr9jpwIb5WiZMZq9LgOZPVNzJAju/SFvHlC8LCGpMG5Cfjk86gnJj/kKRHpZW0uK2RLATQPCLqhC+IciQC/2QyGl7yuZxUuokQ+K8Wpif/SaYZt5pRrGVGZLQQvFYcUjA3zmuBnNQBKJ+DdOvtYejuPIleK8sfFVOZAGsedrKzpu9bwFgAYgTCwxspb5unCUcBBsEMrmzzjUM5sCkF5/XleBPPYfv30vfjKfk3nLdNqWdL0w/1okVZH1J5ShrvswqOLgbZYrV0BrO+adRYoTEGS1D1M8RBSNUh7MNyoACn4J3InLnNTeT34pRErp+yUDBImfTanDdGNi5h/yNa/Oo52C38whSWOq5Z7elVNBnKPSWxQvuCGnisuv5YjZuvuab/1h9Qd7S8k3FUuI37PdOQQ/sZF0YJgV+2T6WfWhwcv4nypiE4uhYuY82UY2aJRLqEJZux2VGwMUf7ruZ9LwL9mYv86hKGzVaJ0092H1EPoPSPGGlCWM6L6UujlUo4c/RPhEGSxQmo++4o='
        ];
    }
}
