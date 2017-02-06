<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
	    public function __construct()
    {	
    	 require("../includes/functions.php");
    }

        public function index()
    {
        return view('quotes');
    }
    	public function lookup()
    	{
    
    		$stock = lookup($_POST["symbol"]);
        	if ($stock != false){
            	return view('quotes')->with('stocks',$stock);
        	}else 
        	if($stock ==  false){
            	apologize("Error Getting Stock :(");
            exit;
        	}
    	return; 
    	}
}
