<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SellStockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request->input('symbol')){
    //TODO: If the request has an input symbol, return view with confirmation.	
    		var_dump($request->input('symbol'));	
    		return view('welcome');
    	}
    //TODO: if the request doesn't have input symbol, return view with user stocks to sell. 
        return view('home');
    }
}