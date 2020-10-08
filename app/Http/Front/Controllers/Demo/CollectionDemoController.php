<?php

namespace App\Http\Front\Controllers\Demo;

use App\Http\Front\Requests\Demo\CollectionDemoRequest;

class CollectionDemoController
{
    public function create()
    {
        return view('front.demo.attachment');
    }

    public function store(CollectionDemoRequest $request)
    {
        /**
         * We're not going to persist in this demo.
         *
         * This is how you would normally handle the upload
         */
//        $yourModel->update(['name' => $request->name);
//
//        $yourModel
//            ->syncFromMediaLibraryRequest($request->images)
//            ->toMediaCollection('images');
//
//        $yourModel
//            ->syncFromMediaLibraryRequest($request->downloads)
//            ->toMediaCollection('downloads');

        flash()->success('The form has been submitted');

        return back();
    }
}
