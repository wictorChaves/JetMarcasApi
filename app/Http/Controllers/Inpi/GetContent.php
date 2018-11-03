<?php

namespace App\Http\Controllers\Inpi;

trait GetContent
{
    private function getPage($url, $method = 'GET', $content = [], $header = [])
    {
        $ctx = stream_context_create([
            'http' => [
                'method' => $method,
                'header' => implode('', $header),
                'content' => implode('&', $content)
            ]
        ]);
        $fp = @fopen($url, 'rb', false, $ctx);
        if (!$fp)
        {
            throw new Exception("Problem with , $php_errormsg");
        }
        $response = @stream_get_contents($fp);
        if ($response === false)
        {
            throw new Exception("Problem reading data from $php_errormsg");
        }
        return $response;
    }
}