<?php

namespace App\Libraries;

use Config\RazorPay as RazorPayConfig;

class RazorPay
{
    protected $config;

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
    // Implement RazorPay functionality using the downloaded SDK
    // You can refer to the SDK documentation for usage: https://github.com/razorpay/razorpay-php
}