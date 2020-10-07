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
            'name' => 'required',
            'images' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->attribute('name', 'required')
                 ->maxItemSizeInKb(512),
            ],
            'downloads' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->maxItemSizeInKb(512),
            ],
        ];
    }
}
