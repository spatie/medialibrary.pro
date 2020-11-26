<?php

namespace App\Http\Front\Controllers;

use Spatie\PriceApi\SpatiePriceApi;

class HomeController
{
    public function __invoke()
    {
        $singlePurchasableId = config('services.spatie_prices_api.single_purchasable_id');
        $singlePrices = SpatiePriceApi::getPriceForPurchasable($singlePurchasableId);

        $unlimitedPurchasableId = config('services.spatie_prices_api.single_purchasable_id');
        $unlimitedPrices = SpatiePriceApi::getPriceForPurchasable($unlimitedPurchasableId);

        return view('front.home.index', [
            'couldFetchSinglePrice' => $singlePrices['couldFetchPrice'],
            'singlePrice' => $singlePrices['actual'],
            'singlePriceWithoutDiscount' => $singlePrices['withoutDiscount'],
            'singleDiscount' => $singlePrices['discount'],

            'couldFetchUnlimitedPrice' => $unlimitedPrices['couldFetchPrice'],
            'unlimitedPrice' => $unlimitedPrices['actual'],
            'unlimitedPriceWithoutDiscount' => $unlimitedPrices['withoutDiscount'],
            'unlimitedDiscount' => $unlimitedPrices['discount'],
        ]);
    }
}
