<?php

namespace App\Http\Controllers\Inpi;

trait JSessionId
{
    public function getJSessionId()
    {
        $url = 'https://gru.inpi.gov.br/pePI/servlet/LoginController?action=login';
        $header = get_headers($url, 1);
        $cookies = $header['Set-Cookie'];
        $arrayCookies = explode(';', $cookies);
        return trim($arrayCookies[0]);
    }
}