<?php

namespace App\Http\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLicenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'domain' => ['required'],
        ];
    }
}
