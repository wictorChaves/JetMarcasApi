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
        header('Access-Control-Allow-Origin: *');
        return $this->getContents();
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
