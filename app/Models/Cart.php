<?php

namespace App;

use CodeIgniter\HTTP\RequestInterface;

class Cart
{
    protected $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    // Implement your cart functionality here
}
