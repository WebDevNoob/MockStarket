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

        $this->validate($request, [
            'amount' => 'required|numeric|greater_than:0'
        ]);
        
    	Auth::user()->cash = Auth::user()->cash + $request->amount;
    	Auth::user()->save();

    	return redirect('home')->with('status', 'Added $' . $request->amount .' to Funds');   
	}
}
