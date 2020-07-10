<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;
use Exception;
use GuzzleHttp\Client;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request)
    {
        $client = new Client();

        $response = $client->post('https://spatie.be/mailcoach/subscribe/4af46b59-3784-41a5-9272-6da31afa3a02', [
            'email' => $request->email,
            'tags' => 'medialibrary-pro',
        ]);

        if ($response->getStatusCode() !== 201 && $response->getStatusCode() !== 200) {
            throw new Exception('Could not subscribe, status code is ' . $response->getStatusCode());
        }

        session()->flash('subscribed');

        return back();
    }
}
