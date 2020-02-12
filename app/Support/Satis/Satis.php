<?php

namespace App\Support\Satis;

use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class Satis
{
    /** @var \GuzzleHttp\Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPackageData(string $package): array
    {
        $data = $this->getAllPackageData();

        $mailcoach = $data["spatie/{$package}"];
        $latest = collect(array_keys($mailcoach))
            ->reduce(function ($carry, $item) {
                return version_compare($carry, $item, '>') ? $carry : $item;
            });

        return [
            'version' => $latest,
            'released_at' => Carbon::parse($mailcoach[$latest]['time'])->format('Y-m-d H:i:s'),
        ];
    }

    private function getAllPackageData(): array
    {
        $response = $this->client->get('https://satis.mailcoach.app/packages.json');

        $data = json_decode($response->getBody()->getContents(), true);
        $all = array_key_first($data['includes']);

        $response = $this->client->get("https://satis.mailcoach.app/{$all}");

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['packages'];
    }
}
