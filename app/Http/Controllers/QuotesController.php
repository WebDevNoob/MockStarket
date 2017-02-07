<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
        
class QuotesController extends Controller
{
	    public function __construct()
    {	
        //Need to refactor this out somehow?
        require("../includes/functions.php");
    }

        public function index()
    {
        return view('quotes');
    }
    	public function lookup(Request $request)
    	{
            $requested = $request['symbol'];
            //lookup function grabs yahoo stock data(includes.functions.php)
    		$stock = lookup($requested);
            return view('quotes')->with('stocks',$stock)->with('requested',$requested);
        }
}
