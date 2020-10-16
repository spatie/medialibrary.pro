<?php

namespace App\Http\Front\Requests\Demo;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class AttachmentDemoRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'media' => $this->validateSingleMedia()->maxItemSizeInKb(1024),
        ];
    }
}
