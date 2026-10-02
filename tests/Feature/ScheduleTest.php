<?php

use Illuminate\Support\Facades\Artisan;

it('runs the demo cleanup commands daily at night', function () {
    Artisan::call('schedule:list');

    $output = Artisan::output();

    expect($output)
        ->toMatch('/^\s*0\s+3 \* \* \*\s+php artisan delete-old-models /m')
        ->toMatch('/^\s*10\s+3 \* \* \*\s+php artisan media-library:delete-old-temporary-uploads /m')
        ->toMatch('/^\s*20\s+3 \* \* \*\s+php artisan delete-old-media-files /m')
        ->not->toContain('* * * * *')
        ->not->toContain('*/5 * * * *');
});
