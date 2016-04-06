<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
