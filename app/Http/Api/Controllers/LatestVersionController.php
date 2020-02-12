<?php

namespace App\Http\Api\Controllers;

use App\Support\Satis\Satis;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Cache;

class LatestVersionController
{
    public function __invoke(Satis $satis)
    {
        return Cache::remember(
            'medialibrary-pro-latest-version-in-satis',
            CarbonInterval::day(1)->totalSeconds,
            fn () => response()->json($satis->getPackageData('medialibrary-pro'))
        );
    }
}
