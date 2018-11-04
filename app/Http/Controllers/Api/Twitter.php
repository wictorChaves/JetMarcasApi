<?php

namespace App\Http\Controllers\Api;

class Twitter
{
    private $url = '';

    public function __construct($brand)
    {
        $this->url = 'https://twitter.com/users/username_available?username=' . $brand;
    }

    public function exist()
    {
        $api = new Api($this->url);
        return $api->getJson()->msg == "Este nome de usuário já esta sendo usado.";
    }

}