<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InpiApiController extends Controller
{
    protected $inpi = 'https://www.tmdn.org/tmview/search-tmv?_search=false&nd=1540562034603&rows=10&page=1&sidx=tm&sord=asc&q=tmsort:%22test%22&fq=[]&pageSize=10&facetQueryType=2&providerList=null&expandedOffices=null&interfacelanguage=en&selectedRowRefNumber=null';
    protected $json = 'https://jsonplaceholder.typicode.com/todos/1';

    //return view('user.profile', ['user' => User::findOrFail($id)]);
    public function index()
    {
        $params = array('http' => array('method' => 'POST', 'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0\r\n" . "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n" . "Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3\r\n" . "Referer: https://gru.inpi.gov.br/pePI/jsp/marcas/Pesquisa_classe_basica.jsp\r\n" . "Content-Type: application/x-www-form-urlencoded\r\n" . "Connection: keep-alive\r\n" . "Cookie: JSESSIONID=E5C2E84295105FA8BD197324DE74408B.tecoa; _ga=GA1.3.1564010215.1540593791\r\n" . "Upgrade-Insecure-Requests: 1", 'content' => 'buscaExata=sim&txt=&marca=teste&classeInter=&registerPerPage=20&botao=+pesquisar+"%"BB+&Action=searchMarca&tipoPesquisa=BY_MARCA_CLASSIF_BASICA'));

        $ctx = stream_context_create($params);
        $fp = @fopen("https://gru.inpi.gov.br/pePI/servlet/MarcasServletController", 'rb', false, $ctx);
        if (!$fp)
        {
            throw new Exception("Problem with , $php_errormsg");
        }

        $response = @stream_get_contents($fp);
        if ($response === false)
        {
            throw new Exception("Problem reading data from $php_errormsg");
        }
        var_dump($response);
        die();
    }

    public function getRequestJson()
    {
        //  Initiate curl
        $ch = curl_init();

        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this->inpi);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        var_dump(json_decode($result, true));
    }

    public function getContents()
    {
        $contents = file_get_contents($this->inpi);
        if ($contents !== false)
        {
            echo $contents;
        }
    }

    public function getPage()
    {
        //Initialize cURL.
        $ch = curl_init();

        //Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, 'https://google.com');

        //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        //Execute the request.
        $data = curl_exec($ch);

        //Close the cURL handle.
        curl_close($ch);

        //Print the data out onto the page.
        echo $data;
    }
}
