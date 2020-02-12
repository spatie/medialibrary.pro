<?php

namespace App\Support\Paddle;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class PaddleSignatureValidator implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $publicKey = file_get_contents(storage_path('app/paddle/publicKey'));

        $signature = base64_decode($request->p_signature);

        $fields = $request->except(['p_signature']);

        ksort($fields);

        foreach ($fields as $key => $value) {
            if (!in_array(gettype($value), ['object', 'array'])) {
                $fields[$key] = "$value";
            }
        }
        $data = serialize($fields);

        return openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA1) === 1;
    }
}
