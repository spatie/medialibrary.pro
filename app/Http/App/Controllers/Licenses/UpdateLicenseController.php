<?php

namespace App\Http\App\Controllers\Licenses;

use App\Http\App\Requests\UpdateLicenseRequest;
use App\Models\License;

class UpdateLicenseController
{
    public function update(License $license, UpdateLicenseRequest $request)
    {
        $license->update(['domain' => $request->get('domain')]);

        flash()->success('Your license has been updated.');

        return redirect()->action(LicensesIndexController::class);
    }
}
