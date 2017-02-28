<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\userStock;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $userStocks = \App\userStock::where('id', $userId)->get()->toArray();
        /*Notice! 
          Assigned by reference
          Cheater McCheaterface way of doing it, BE BETTER THAN THIS
                be aware of the &   */
        foreach ($userStocks as &$userStock) {
          array_shift($userStock); 
        }
        return view('home')->with('userStocks',$userStocks);
    }
}
