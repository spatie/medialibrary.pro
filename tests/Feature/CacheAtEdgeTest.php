<?php

beforeEach(function () {
    $this->withoutVite();
});

it('caches pages at the edge without setting cookies', function (string $url) {
    $response = $this->get($url)->assertOk();

    expect($response->headers->get('Cache-Control'))->toBe('max-age=60, public, s-maxage=604800');
    expect($response->headers->getCookies())->toBeEmpty();
})->with([
    '/',
    '/?subscribed=1',
    '/?subscription-failed=1',
    '/?referrer=freek',
    '/terms-of-use',
    '/privacy',
    '/robots.txt',
]);

it('caches not found pages at the edge', function () {
    $response = $this->get('/does-not-exist')->assertNotFound();

    expect($response->headers->get('Cache-Control'))->toBe('max-age=60, public, s-maxage=604800');
});

it('does not cache the subscribe form submission', function () {
    $response = $this->post('/subscribe', ['email' => 'freek@spatie.be']);

    expect($response->headers->get('Cache-Control'))->not->toContain('public');
});

it('does not cache the demo pages that need a session', function (string $url) {
    $response = $this->get($url)->assertOk();

    expect($response->headers->get('Cache-Control'))->not->toContain('public');
    expect(collect($response->headers->getCookies())->map->getName())->toContain(config('session.cookie'));
})->with([
    '/demo-attachment',
    '/demo-collection',
    '/demo-customized-collection',
]);

it('does not cache the demo redirect', function () {
    $response = $this->get('/demo')->assertRedirect('/demo-attachment');

    expect($response->headers->get('Cache-Control'))->not->toContain('public');
});

it('does not cache the health check', function () {
    $response = $this->get('/up')->assertOk();

    expect($response->headers->get('Cache-Control'))->not->toContain('public');
});

it('does not cache pages locally', function () {
    app()->detectEnvironment(fn () => 'local');

    $response = $this->get('/')->assertOk();

    expect($response->headers->get('Cache-Control'))->not->toContain('public');
});
