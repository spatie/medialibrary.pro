<?php

namespace App\Actions;

use App\Models\License;
use App\Models\Product;
use App\Models\User;
use App\Support\Paddle\PaddlePayload;

class CreatePurchaseAndNewLicenseAction
{
    public function execute(User $user, Product $product, PaddlePayload $paddlePayload)
    {
        $license = License::createForProduct($product, $user);

        (new CreatePurchaseAction())->execute($user, $product, $paddlePayload, $license);
    }
}
