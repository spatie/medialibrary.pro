<?php

namespace App\Http\App\Controllers\Videos;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoCompletionController
{
    public function store(Video $video, Request $request)
    {
        $request->user()->videos()->syncWithoutDetaching($video);

        if ($request->ajax()) {
            return response()->json([], 201);
        }

        return back();
    }

    public function destroy(Video $video, Request $request)
    {
        $request->user()->videos()->detach($video);

        if ($request->ajax()) {
            return response()->json([], 204);
        }

        return back();
    }
}
