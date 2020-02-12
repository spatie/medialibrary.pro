<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\User;
use App\Support\Paddle\PaddlePayload;

class CreatePurchaseAndRenewLicenseAction
{
    public function execute(User $user, Product $product, PaddlePayload $paddlePayload)
    {
        $license = $paddlePayload->license()->renew();

        (new CreatePurchaseAction())->execute($user, $product, $paddlePayload, $license);
    }
}
