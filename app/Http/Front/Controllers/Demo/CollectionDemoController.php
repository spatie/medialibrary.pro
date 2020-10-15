<?php

namespace App\Http\Front\Controllers\Demo;

use App\Http\Front\Requests\Demo\CollectionDemoRequest;
use App\Models\FormSubmission;

class CollectionDemoController
{
    public function create()
    {
        $formSubmission = FormSubmission::findForCurrentSession();

        return view('front.demo.collection', [
            'formSubmission' => $formSubmission,
            'images' => $formSubmission->getMedia('images'),
            'downloads' => $formSubmission->getMedia('downloads'),
        ]);
    }

    public function store(CollectionDemoRequest $request)
    {
        $formSubmission = FormSubmission::findForCurrentSession();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->downloads)
            ->toMediaCollection('downloads');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
