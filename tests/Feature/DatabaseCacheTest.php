<?php

use Illuminate\Support\Facades\Cache;

it('can store binary values in the database cache', function () {
    $binaryValue = "\xD2\x01\x0Av\x0At";

    Cache::store('database')->put('binary-value', $binaryValue);

    expect(Cache::store('database')->get('binary-value'))->toBe($binaryValue);
});

it('can store sessions in the database', function () {
    config()->set('session.driver', 'database');

    $this->withoutVite();

    $this->get('/terms-of-use')->assertOk();

    $this->assertDatabaseCount('sessions', 1);
});
