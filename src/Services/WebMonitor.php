<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WebMonitor
{
    private Client $client;

    /**
     * WebMonitor constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function ping(string $url): int
    {
        try {
            $response = $this->client->get($url);

            return $response->getStatusCode();
        } catch (GuzzleException $e) {
            return $e->getCode();
        }
    }
}
