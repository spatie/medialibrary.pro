<?php

namespace App\Support\Paddle;

use App\Exceptions\CouldNotHandlePaymentSucceeded;
use App\Models\License;
use Spatie\WebhookClient\Models\WebhookCall;

class PaddlePayload
{
    private WebhookCall $webhookCall;

    private array $payload;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;

        $this->payload = $webhookCall->payload;
    }

    public function __get(string $name)
    {
        return $this->payload[$name] ?? null;
    }

    public function toArray(): array
    {
        return $this->payload;
    }

    public function license(): License
    {
        $passthrough = json_decode($this->passthrough, true);

        if (!isset($passthrough['license']) || !$passthrough['license']) {
            throw CouldNotHandlePaymentSucceeded::renewalWithoutLicense($this->webhookCall);
        }

        return License::query()
            ->where('key', $passthrough['license'])
            ->firstOrFail();
    }
}
