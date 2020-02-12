<?php

namespace App\Actions;

use App\Models\License;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Support\Paddle\PaddlePayload;

class CreatePurchaseAction
{
    public function execute(User $user, Product $product, PaddlePayload $paddlePayload, ?License $license = null): Purchase
    {
        return Purchase::create([
            'license_id' => optional($license)->id,
            'user_id' => $user->id,
            'product_id' => $product->id,
            'receipt_url' => $paddlePayload->receipt_url,
            'payment_method' => $paddlePayload->payment_method,
            'paddle_alert_id' => $paddlePayload->alert_id,
            'paddle_fee' => $paddlePayload->fee,
            'payment_tax' => $paddlePayload->payment_tax,
            'earnings' => $paddlePayload->earnings,
            'paddle_webhook_payload' => $paddlePayload->toArray(),
        ]);
    }
}
