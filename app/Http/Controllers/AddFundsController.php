<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AddFundsController extends Controller
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

    public function index()
    {
        return view('addFunds');
    }


    public function addToFund(Request $request)
    {  	
    	//Get amount to add from post request
    	$amountToAdd = $request->addedMoney;
    	//Update only if requested amount is positive
    	if ($amountToAdd > 0) {
    		Auth::user()->cash = Auth::user()->cash + $request->addedMoney;
    		Auth::user()->save();
    		return redirect()->action('HomeController@index')->with('status', 'Added Funds'); 
    	}else{
    		//Not very good. Should have some indication that it failed to work for the user. 
    		return redirect()->action('HomeController@index');
    	}  
	}
}
