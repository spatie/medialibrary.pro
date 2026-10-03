<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    $this->withoutVite();
});

it('shows the home page without fetching prices on the server', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('https://spatie.be/products/media-library-pro')
        ->assertSee('x-data="spatiePrice(9)"', false)
        ->assertSee('x-data="spatiePrice(11)"', false)
        ->assertSee('window.spatiePrice', false)
        ->assertSee('countdown.seconds', false)
        ->assertSee('Unlimited applications')
        ->assertSee('Single application');

    Http::assertNothingSent();
});

it('remembers the referrer in the browser', function () {
    $this->get('/?referrer=freek')
        ->assertOk()
        ->assertSee("searchParams.set('referrer', rememberedReferrer)", false)
        ->assertDontSee('?referrer=freek');
});

it('confirms a newsletter subscription', function () {
    $this->get('/?subscribed=1')
        ->assertOk()
        ->assertSee("Thanks! You'll hear from us soon", false)
        ->assertDontSee('We could not subscribe you.');
});

it('shows that a subscription failed', function () {
    $this->get('/?subscription-failed=1')
        ->assertOk()
        ->assertSee('We could not subscribe you.')
        ->assertDontSee("Thanks! You'll hear from us soon", false);
});

it('does not show subscription messages by default', function () {
    $this->get('/')
        ->assertSee('Your address will only be used for updates on Media Library Pro')
        ->assertDontSee("Thanks! You'll hear from us soon", false)
        ->assertDontSee('We could not subscribe you.');
});

it('does not show flash messages on the cacheable pages', function () {
    flash()->success('A flashed message');

    $this->get('/')
        ->assertOk()
        ->assertDontSee('A flashed message');
});

it('does not render a csrf token in the newsletter form', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('action="/subscribe"', false)
        ->assertDontSee('name="_token"', false);
});

it('serves robots.txt', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
        ->assertSee('User-agent: *');
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
