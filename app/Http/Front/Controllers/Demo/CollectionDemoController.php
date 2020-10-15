<?php

namespace App\Http\Front\Controllers\Demo;

use App\Http\Front\Requests\Demo\CollectionDemoRequest;
use App\Models\FormSubmission;

class CollectionDemoController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first() ?? FormSubmission::create(['name' => 'test']);

        return view('front.demo.collection', [
            'formSubmission' => $formSubmission,
            'images' => $formSubmission->getMedia('images'),
            'downloads' => $formSubmission->getMedia('downloads'),
        ]);
    }

    public function store(CollectionDemoRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->images)
            ->toMediaCollection('images');

        $formSubmission
            ->syncFromMediaLibraryRequest($request->downloads)
            ->toMediaCollection('downloads');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
