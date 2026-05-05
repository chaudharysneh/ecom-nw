<?php

namespace App\Libraries;

use Config\RazorPay as RazorPayConfig;
use GuzzleHttp\Client;

class RazorPay
{
    protected $config;
    protected $client;

    public function __construct()
    {
        $this->config = new RazorPayConfig();
        $this->client = new Client(['base_uri' => $this->config->apiEndpoint]);
    }

    public function createOrder($data)
    {
        $response = $this->client->post('orders', [
            'auth' => [$this->config->keyId, $this->config->keySecret],
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }

    // Add more methods for payment handling as needed
}