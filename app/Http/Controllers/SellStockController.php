<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Includes\ReturnLookup;


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

    public function index()
    {
        $userStocks = \App\userStock::where('id', Auth::user()->id)->get();
        $formSelections = [];
        foreach ($userStocks as $stock) {
            $formSelections[$stock->symbol] = $stock->name;            
        }

        return view('sell')->with('formSelections' , $formSelections);
    }

    public function sellStocks(Request $request)
    {

        //Variable Declaration
        $requestedStockRecord = \App\userStock::where('id', Auth::user()->id)->where('symbol', $request->stock);
        $currentShares = $requestedStockRecord->value('shares');
        $remainingShares = $currentShares - $request->sellAmount;
        $moneyMath = ReturnLookup::lookupStock($request->stock)['price'] * $request->sellAmount;

        //Form Validation
        $this->validate($request, [
            'sellAmount' => 'required|numeric|greater_than:0|less_than:'. $currentShares
        ]);

        //Request Processing
        $requestedStockRecord->update(['shares' => $remainingShares]);
        Auth::user()->cash = Auth::user()->cash + $moneyMath;
        Auth::user()->save();
        
        //Post Request Record Check
        if ($remainingShares <= 0 ){
            $requestedStockRecord->delete();
            return redirect('home')->with('status','Sucess, $' . $moneyMath . ' has been added to your account. No more shares of ' . $request->stock . ' left.');
        }
                
        //Redirect home
        return redirect('home')->with('status','Sucess, $' . $moneyMath . ' has been added to your account.');
    }

}