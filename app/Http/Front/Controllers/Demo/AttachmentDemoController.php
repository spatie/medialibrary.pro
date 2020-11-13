<?php

namespace App\Http\Front\Controllers\Demo;

use App\Http\Front\Requests\Demo\AttachmentDemoRequest;

class AttachmentDemoController
{
    public function create()
    {
        return view('front.demo.attachment');
    }

    public function store(AttachmentDemoRequest $request)
    {
        /**
         * We're not going to persist in this demo.
         *
         * This is how you would normally handle the upload
         */
//        $yourModel
//            ->addFromMediaLibraryRequest($request->media)
//            ->toMediaLibrary();

        flash()->success('Thanks for uploading your file! ');

        return back();
    }
}
