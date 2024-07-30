<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleMyBusinessService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GOOGLE_MY_BUSINESS_API_KEY'); // Store your API key in the .env file
    }

    public function getRelatedBusinesses($placeId)
    {
        $url = "https://mybusiness.googleapis.com/v4/accounts/{accountId}/locations/{locationId}/reviews";
        $response = $this->client->get($url, [
            'query' => [
                'key' => $this->apiKey,
                'placeId' => $placeId,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
