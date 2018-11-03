<?php

namespace App\Http\Controllers;

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

    public function inpi()
    {
        return response()->json($this->inpiRequest->existBrand('teste'));
    }

}
