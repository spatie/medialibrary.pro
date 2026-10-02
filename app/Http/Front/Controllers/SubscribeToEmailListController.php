<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request): RedirectResponse
    {
        $listUuid = config('services.mailcoach.list_uuid');

        if (! $listUuid) {
            flash()->error('Subscribing is not possible at the moment.');

            return back();
        }

        $response = Http::asForm()->post("https://spatie.be/mailcoach/subscribe/{$listUuid}", [
            'email' => $request->email,
            'tags' => 'medialibrary-pro',
        ]);

        if (! $response->successful()) {
            throw new Exception("Could not subscribe, status code is {$response->status()}");
        }

        session()->flash('subscribed');

        return back();
    }
}
