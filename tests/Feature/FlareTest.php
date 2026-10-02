<?php

use Spatie\FlareClient\Flare as FlareClient;
use Spatie\LaravelFlare\FlareConfig;

it('reports exceptions to Flare when a key is configured', function () {
    $exception = new RuntimeException('Something went wrong');

    $flare = Mockery::mock(FlareClient::class);
    $flare->shouldReceive('report')->once()->with($exception);

    app()->instance(FlareConfig::class, FlareConfig::make('test-key'));
    app()->instance(FlareClient::class, $flare);

    report($exception);
});

it('does not report exceptions to Flare without a key', function () {
    $flare = Mockery::mock(FlareClient::class);
    $flare->shouldNotReceive('report');

    app()->instance(FlareConfig::class, new FlareConfig(apiToken: null));
    app()->instance(FlareClient::class, $flare);

    report(new RuntimeException('Something went wrong'));
});
