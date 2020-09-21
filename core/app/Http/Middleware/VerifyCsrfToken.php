<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/home/ipnstripe', '/home/tranfee', '/home/convert-fee',
        '/api/login','/api/logout','api/usd-trans','api/btc-trans','api/change-password','api/referal','api/deposit','api/withdraw','api/coins','api/buy-coin'
    ];
}
