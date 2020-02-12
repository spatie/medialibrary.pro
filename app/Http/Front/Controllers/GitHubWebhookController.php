<?php

namespace App\Http\Front\Controllers;

use App\Domain\Docs\Jobs\UpdateDocumentationJob;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class GitHubWebhookController
{
    public function __invoke()
    {
        info('GitHub webhook received.');

        if (!$this->signatureIsValid()) {
            abort(Response::HTTP_FORBIDDEN, 'The signature was invalid!');
        };

        dispatch(new UpdateDocumentationJob());
    }

    private function signatureIsValid(): bool
    {
        $data = file_get_contents('php://input');

        info('Received data from webhook'. $data);

        $actualSignature = Str::after(request()->header('X-Hub-Signature'), 'sha1=');

        $expectedSignature = hash_hmac('sha1', $data, config('services.github.webhook_secret'));

        info("Actual signature: `{$actualSignature}`, expected signature: `{$expectedSignature}`");

        return $actualSignature === $expectedSignature;
    }
}
