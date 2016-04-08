<?php

namespace Cube\Http\Controllers;

use Illuminate\Http\Request;

use Cube\Http\Requests;

class HomeController extends Controller
{
	/**
	 *	Muestra la página de inicio
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
    	return view('index');
    }
}
