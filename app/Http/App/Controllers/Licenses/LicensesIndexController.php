<?php

namespace App\Http\App\Controllers\Licenses;

use App\Models\Product;

class LicensesIndexController
{
    public function __invoke()
    {
        $licenses = auth()->user()->licenses;

        $standardProduct = Product::where('type', Product::TYPE_STANDARD)->first();
        $standardRenewalProduct = Product::where('type', Product::TYPE_STANDARD_RENEWAL)->first();

        $videosProduct = Product::where('type', Product::TYPE_VIDEOS)->first();

        $justMadePurchase = session()->has('made-purchase');

        return view('app.licenses.index', compact(
            'licenses',
            'standardProduct',
            'standardRenewalProduct',
            'videosProduct',
            'justMadePurchase',
        ));
    }
}
