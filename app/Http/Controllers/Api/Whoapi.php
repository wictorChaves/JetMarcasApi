<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Tokens\Tokens;

class Whoapi
{
    private $url = '';

    public function __construct($brand)
    {
        $this->url = 'http://api.whoapi.com/?domain=' . $brand . '.com.br&r=whois&apikey=' . Tokens::$whoapi;
    }

    public function exist()
    {
        $api = new Api($this->url);
        return $api->getJson()->registered;
    }

}