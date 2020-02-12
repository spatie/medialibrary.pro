<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request)
    {
        $emailList = $request->emailList();

        $emailList->subscribe($request->email);

        session()->flash('subscribed');

        return back();
    }
}
