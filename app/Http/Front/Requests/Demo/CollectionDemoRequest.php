<?php

namespace App\Http\Front\Requests\Demo;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class CollectionDemoRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'downloads' => $this->validateMultipleMedia()
                ->maxItems(3)
                ->maxItemSizeInKb(512),
        ];
    }
}
