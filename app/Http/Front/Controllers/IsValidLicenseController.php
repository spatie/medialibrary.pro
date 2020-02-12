<?php

namespace App\Http\Front\Controllers;

use App\Models\License;
use Illuminate\Routing\Controller;

class IsValidLicenseController extends Controller
{
    public function __invoke(License $license)
    {
        abort_if($license->isExpired(), 401);

        return 'OK';
    }
}
