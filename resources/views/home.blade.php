@extends('layouts.app')

@section('content')
<div class="offset-md-2">
    <div class="container">
            <div class="panel panel-default text-left">
                <div class="panel-heading">
                    <a href="{{ route('quotes')}}" class="btn btn-default navbar-btn">Lookup Stock</a>
                    <a href="buy.php?symbol=" class="btn btn-default navbar-btn">Buy Stock</a>
                    <a href="sell.php?symbol=" class="btn btn-default navbar-btn">Sell Stock</a>
                    <a href="history.php" class="btn btn-default navbar-btn">History</a>
                    <a href="addFunds.php" class="btn btn-default navbar-btn">Add Funds</a>
                    <a href="{{ route('logout') }}" class="btn btn-default navbar-btn" 
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">Logout</a>
                </div>
                <div class="panel-body">
                    <div class="content"></div>
                </div>
            </div>
    </div>
</div>
@endsection
