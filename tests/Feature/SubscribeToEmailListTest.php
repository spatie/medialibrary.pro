<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

it('subscribes an email address to the newsletter', function () {
    config()->set('services.mailcoach.list_uuid', 'test-uuid');

    Http::fake(['spatie.be/mailcoach/subscribe/*' => Http::response()]);

    $this->from('/')
        ->post('/subscribe', ['email' => 'freek@spatie.be'])
        ->assertRedirect('/')
        ->assertSessionHas('subscribed');

    Http::assertSent(fn ($request) => $request->url() === 'https://spatie.be/mailcoach/subscribe/test-uuid'
        && $request['email'] === 'freek@spatie.be'
        && $request['tags'] === 'medialibrary-pro');
});

it('does not subscribe when no list uuid is configured', function () {
    config()->set('services.mailcoach.list_uuid', null);

    Http::fake();

    $this->from('/')
        ->post('/subscribe', ['email' => 'freek@spatie.be'])
        ->assertRedirect('/')
        ->assertSessionMissing('subscribed');

    Http::assertNothingSent();
});

it('requires a valid email address', function () {
    config()->set('services.mailcoach.list_uuid', 'test-uuid');

    Http::fake();

    $this->from('/')
        ->post('/subscribe', ['email' => 'not-an-email'])
        ->assertRedirect('/')
        ->assertSessionHasErrors('email');

    Http::assertNothingSent();
});
