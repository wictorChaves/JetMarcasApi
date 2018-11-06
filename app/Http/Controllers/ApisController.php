<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Emails;
use App\Http\Controllers\Api\Twitter;
use App\Http\Controllers\Api\Whoapi;
use App\Http\Controllers\Api\Youtube;
use App\Http\Controllers\Inpi\InpiRequest;

class ApisController extends Controller
{

    /**
     * @var InpiRequest
     */
    protected $inpiRequest;

    public function __construct(InpiRequest $inpiRequest)
    {
        $this->inpiRequest = $inpiRequest;
    }

    public function inpi($brand)
    {
        return response()->json(!$this->inpiRequest->existBrand($brand));
    }

    public function youtube($brand)
    {
        $youtube = new Youtube($brand);
        return response()->json(!$youtube->exist());
    }

    public function whoapi($brand)
    {
        $whoapi = new Whoapi($brand);
        return response()->json(!$whoapi->exist());
    }

    public function gmail($brand)
    {
        $emails = new Emails($brand . '@gmail.com');
        return response()->json(!$emails->exist());
    }

    public function hotmail($brand)
    {
        $emails = new Emails($brand . '@hotmail.com');
        return response()->json(!$emails->exist());
    }

    public function twitter($brand)
    {
        $twitter = new Twitter($brand);
        return response()->json(!$twitter->exist());
    }

}
