<?php

namespace App\Http\App\Controllers;

class PurchasesIndexController
{
    public function __invoke()
    {
        return view('app.purchases.index', [
            'purchases' => auth()->user()->purchases,
        ]);
    }
}
