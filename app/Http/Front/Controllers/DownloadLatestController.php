<?php

namespace App\Http\Front\Controllers;

use App\Models\License;
use Illuminate\Support\Facades\Storage;

class DownloadLatestController
{
    public function __invoke(License $license)
    {
        $url = Storage::disk('s3')->temporaryUrl(
            'latest.zip',
            now()->addMinutes(1)
        );

        $license->increment('mailcoach_download_count');

        return redirect()->to($url);
    }
}
