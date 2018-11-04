<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Tokens\Tokens;

class Emails
{
    private $url = '';

    public function __construct($brand)
    {
        $this->url = 'https://apilayer.net/api/check?access_key=' . Tokens::$emails . '&email=' . $brand;
    }

    public function exist()
    {
        $api = new Api($this->url);
        return $api->getJson()->smtp_check;
    }

}