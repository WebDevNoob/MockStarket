@extends('layouts.app')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


@section('content')

<div class="offset-md-2">
    <div class="container">
            <div class="panel panel-default text-left">
                <div class="panel-heading">
                    <a href="{{ route('quotes')}}" class="btn btn-default navbar-btn">Lookup Stock</a>
                    <a href="history.php" class="btn btn-default navbar-btn">History</a>
                    <a href="{{ route('addFunds')}}" class="btn btn-default navbar-btn">Add Funds</a>
                    <a href="{{ route('logout') }}" class="btn btn-default navbar-btn" 
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">Logout</a>
                </div>
                <div class="panel-body">
                    <div class="content">
                        <center>{{Auth::user()->username}} ${{money_format('%i',Auth::user()->cash)}} monies!</center>
            @if(isset($userStocks))
            <table class="table table-hover">
            <thead><tr>
                <th>Shares</th>
                <th>Symbol</th>
                <th>Company Name</th>
                <th>Options</th>
            </tr></thead>
            <tbody>

                @foreach ($userStocks as $userStock)
                <tr>             
                    @foreach ($userStock as $stocks)
                    <td><a href="{{url('quotes?symbol=' . $userStock['symbol'])}}">{{$stocks}}</a></td>
                    @endforeach


                    <td><a href="{{url('buy/' . $userStock['symbol'])}}" class="btn btn-default navbar-btn">Buy Stock</a>
                        <a href="{{url('sell?name=' . $userStock['name'])}}" class="btn btn-default navbar-btn">Sell Stock</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
