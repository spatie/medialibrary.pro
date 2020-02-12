<?php

namespace App\Http\App\Controllers;

use App\Models\Release;

class ReleasesController
{
    public function __invoke()
    {
        $releases = Release::orderByDesc('created_at')->all();

        return view('app.releases.index', compact('releases'));
    }
}
