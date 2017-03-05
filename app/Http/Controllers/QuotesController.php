<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Includes\ReturnLookup;
        
class QuotesController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
	public function __construct()
    {	
    }

    public function index()
    {
        return view('quotes');
    }

    public function lookup(Request $request)
    {
        $requestedStock = $request['symbol'];
    	$stock = ReturnLookup::lookupStock($requestedStock);
        return view('quotes')->with('stocks',$stock)->with('requested',$requestedStock);
    }
}
