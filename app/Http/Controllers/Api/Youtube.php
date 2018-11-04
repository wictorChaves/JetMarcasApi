<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Tokens\Tokens;

class Youtube
{
    private $url = '';

    public function __construct($brand)
    {
        $this->url = 'https://www.googleapis.com/youtube/v3/channels?key=' . Tokens::$google . '&forUsername=' . $brand . '&part=id';
    }

    public function exist()
    {
        $api = new Api($this->url);
        return count($api->getJson()->items) > 0;
    }

}