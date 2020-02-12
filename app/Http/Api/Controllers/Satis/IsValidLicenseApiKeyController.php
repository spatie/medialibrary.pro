<?php

namespace App\Http\Api\Controllers\Satis;

use Illuminate\Routing\Controller;

class IsValidLicenseApiKeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:license-api');
    }

    public function __invoke()
    {
        return response('valid license', 200);
    }
}
