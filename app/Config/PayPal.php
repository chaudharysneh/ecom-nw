<?php

namespace Config;

class PayPal
{
    public $ClientId = 'ATfGAKwhHyINbdhdh8HNUwngkXGYB-8Hm5Npw9CE1Kv-QInzsB54-CJDVi1bTUK5xIMx7c0LGUmOWOlr';
    public $ClientSecret = 'ECducdb2YksIeU5mcUhoZzP_9BMntuNUnSAs5mQjNNH5eaEblC6WIoQHPj2LqZzCtOOkEcQcHF3lK2w6';
    public $liveClientId = 'YOUR_LIVE_CLIENT_ID';
    public $liveClientSecret = 'YOUR_LIVE_CLIENT_SECRET';

    public function __construct()
    {
        $this->clientId = $this->ClientId;
        $this->clientSecret = $this->ClientSecret;
    }
}