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
    	Auth::user()->cash = Auth::user()->cash + $request->addedMoney;
    	Auth::user()->save();
		return redirect()->action('HomeController@index');    
	}
}
