<?php

namespace App\Http\App\Controllers\Videos;

use App\Models\Chapter;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController
{
    public function index(Request $request)
    {
        $chapters = Chapter::with('videos')->get();

        return view('app.videos.index', compact(
            'chapters',
        ));
    }

    public function show(Chapter $chapter, Video $video, Request $request)
    {
        $chapters = Chapter::with('videos')->get();

        $previousVideo = $video->getPreviousVideo();
        $nextVideo = $video->getNextVideo();
        $currentVideo = $video;

        return view('app.videos.show', compact(
            'chapters',
            'chapter',
            'currentVideo',
            'previousVideo',
            'nextVideo',
        ));
    }
}
