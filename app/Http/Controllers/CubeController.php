<?php

namespace Cube\Http\Controllers;

use Illuminate\Http\Request;

use Cube\Http\Requests;
use Cube\Cube;

class CubeController extends Controller
{
    public function initialization(Request $request)
    {
    	$input = $request->input('strings');

    	$cube = new Cube;

    	$response = $cube->setString($input);

    	return $response;
    	
    }
}
