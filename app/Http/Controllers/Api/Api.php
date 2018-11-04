<?php

namespace App\Http\Controllers\Api;

class Api
{
    private $url = '';

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getJson()
    {
        return json_decode(file_get_contents($this->url));
    }
}