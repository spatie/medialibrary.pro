<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

it('subscribes an email address to the newsletter', function () {
    config()->set('services.mailcoach.list_uuid', 'test-uuid');

    Http::fake(['spatie.be/mailcoach/subscribe/*' => Http::response()]);

    $this->post('/subscribe', ['email' => 'freek@spatie.be'])
        ->assertRedirect('/?subscribed=1');

    Http::assertSent(fn (Request $request) => $request->url() === 'https://spatie.be/mailcoach/subscribe/test-uuid'
        && $request['email'] === 'freek@spatie.be'
        && $request['tags'] === 'medialibrary-pro');
});

it('does not subscribe when no list uuid is configured', function () {
    config()->set('services.mailcoach.list_uuid', null);

    Http::fake();

    $this->post('/subscribe', ['email' => 'freek@spatie.be'])
        ->assertRedirect('/?subscription-failed=1');

    Http::assertNothingSent();
});

it('requires a valid email address', function () {
    config()->set('services.mailcoach.list_uuid', 'test-uuid');

    Http::fake();

    $this->post('/subscribe', ['email' => 'not-an-email'])
        ->assertRedirect('/?subscription-failed=1');

    Http::assertNothingSent();
});

it('does not need a session to subscribe', function () {
    config()->set('services.mailcoach.list_uuid', 'test-uuid');

    Http::fake(['spatie.be/mailcoach/subscribe/*' => Http::response()]);

    $response = $this->post('/subscribe', ['email' => 'freek@spatie.be']);

    expect($response->headers->getCookies())->toBeEmpty();
});
