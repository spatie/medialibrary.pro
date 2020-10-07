<?php

namespace App\Http\Front\Requests\Demo;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentDemoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateSingleMedia()
                ->minSizeInKb(300)
                ->maxItemSizeInKb(2000),
            ],
        ];
    }
}
