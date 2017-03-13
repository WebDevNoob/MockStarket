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

    public function index($symbol = null, Request $request)
    {
        if ($request->input('symbol')){
            $symbol = $request->input('symbol');
        }

        if ($symbol){
            return view('quotes')->with('stocks', ReturnLookup::lookupStock($symbol))->with('requested',$symbol);            
        }else{
            return view('quotes');
        }
        
    }
}
