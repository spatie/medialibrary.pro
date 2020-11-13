<?php

namespace App\Http\Front\Controllers\Demo;

use App\Http\Front\Requests\Demo\CustomizedCollectionDemoRequest;
use App\Models\FormSubmission;

class CustomizedCollectionDemoController
{
    public function create()
    {
        $formSubmission = FormSubmission::findForCurrentSession();

        return view('front.demo.customized-collection', [
            'formSubmission' => $formSubmission,
            'downloads' => $formSubmission->getMedia('downloads'),
        ]);
    }

    public function store(CustomizedCollectionDemoRequest $request)
    {
        $formSubmission = FormSubmission::findForCurrentSession();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->downloads)
            ->withCustomProperties('extra_field')
            ->toMediaCollection('downloads');

        flash()->success('The collection has been saved!');

        return back();
    }
}
