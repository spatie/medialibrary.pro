<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    $this->withoutMix();
});

function fakePriceApi(bool $discountActive = false): void
{
    Http::fake([
        'spatie.be/api/price/*' => Http::response([
            'actual' => ['price_in_cents' => 6900, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 69'],
            'without_discount' => ['price_in_cents' => 9900, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 99'],
            'discount' => ['active' => $discountActive, 'percentage' => 30, 'name' => 'BLACK FRIDAY', 'expires_at' => (string) now()->addDays(3)->timestamp],
        ]),
    ]);
}

it('shows the home page with the prices', function () {
    fakePriceApi();

    $this->get('/')
        ->assertOk()
        ->assertSee('https://spatie.be/products/media-library-pro')
        ->assertDontSee('BLACK FRIDAY ends in');

    Http::assertSent(fn ($request) => str_starts_with($request->url(), 'https://spatie.be/api/price/9/'));
    Http::assertSent(fn ($request) => str_starts_with($request->url(), 'https://spatie.be/api/price/11/'));
});

it('shows a countdown when a discount is active', function () {
    fakePriceApi(discountActive: true);

    $this->get('/')
        ->assertOk()
        ->assertSee('BLACK FRIDAY ends in')
        ->assertSee('x-text="timer.days"', false);
});

it('shows the home page when the prices cannot be fetched', function () {
    Http::fake(['spatie.be/api/price/*' => Http::response(status: 500)]);

    $this->get('/')->assertOk();
});

it('remembers the referrer in the links to spatie.be', function () {
    fakePriceApi();

    $this->get('/?referrer=freek')
        ->assertOk()
        ->assertSee('https://spatie.be/products/media-library-pro?referrer=freek');
});

it('shows the static pages', function (string $url, string $text) {
    $this->get($url)->assertOk()->assertSee($text);
})->with([
    ['/terms-of-use', 'Media Library Pro Terms of Use'],
    ['/privacy', 'privacy and cookie policy'],
]);

it('redirects the demo page to the attachment demo', function () {
    $this->get('/demo')->assertRedirect('/demo-attachment');
});

it('returns a 404 for unknown pages', function () {
    $this->get('/does-not-exist')->assertNotFound();
});

it('has a health check endpoint', function () {
    $this->get('/up')->assertOk();
});
