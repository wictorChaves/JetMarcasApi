<?php

namespace App\Http\Controllers;

class InpiApiController extends Controller
{

    public function index()
    {
        return response()->json($this->existBrand('teste'));
    }

    public function existBrand($search)
    {
        return substr_count($this->searchBrand($search), 'NCL') > 0;
    }

    public function getJSessionId()
    {
        $url = 'https://gru.inpi.gov.br/pePI/servlet/LoginController?action=login';
        $header = get_headers($url, 1);
        $cookies = $header['Set-Cookie'];
        $arrayCookies = explode(';', $cookies);
        return trim($arrayCookies[0]);
    }

    public function searchBrand($search)
    {
        $header = [
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0\r\n",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n",
            "Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3\r\n",
            "Referer: https://gru.inpi.gov.br/pePI/jsp/marcas/Pesquisa_classe_basica.jsp\r\n",
            "Content-Type: application/x-www-form-urlencoded\r\n",
            "Connection: keep-alive\r\n",
            "Cookie: " . $this->getJSessionId() . "; _ga=GA1.3.1564010215.1540593791; _gid=GA1.3.902493617.1541122458\r\n",
            "Upgrade-Insecure-Requests: 1"
        ];
        $content = [
            'buscaExata=sim',
            'txt=',
            'marca=' . $search,
            'classeInter=',
            'registerPerPage=20',
            'botao=+pesquisar+"%"BB+',
            'Action=searchMarca',
            'tipoPesquisa=BY_MARCA_CLASSIF_BASICA'
        ];
        return $this->getPage("https://gru.inpi.gov.br/pePI/servlet/MarcasServletController", 'POST', $content, $header);
    }

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
        echo $response;
        die();
        return $response;
    }
}
