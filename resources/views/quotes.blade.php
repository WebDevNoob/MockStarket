@extends('layouts.app')
@include('layouts.quoteform')

@section('content')
    <div class="container">
        <div class="row text-center">
            <h3>Quote</h3>
        </div>    
        <div class="row text-center">

    @if(isset($stocks))
        @if(is_array($stocks))
            <table class="table table-hover">
            <thead><tr>
                <th>Company Name</th>
                <th>Symbol</th>
                <th>Trading Price</th>
            </tr></thead>
            <tbody><tr>
                <td>{{$stocks["name"]}}</td>
                <td>{{$stocks["symbol"]}}</td>
                <td>${{$stocks["price"]}}</td>
            </tr></tbody>
            </table>
        <a href="{{route('quotes')}}" class="btn btn-default">Get Another Quote</a>
        @if (Auth::check())
        <a href="{{route('home')}}" class="btn btn-default">Dashboard</a>
        @endif

        @endif
        @if(is_string($stocks))
            <div class="alert alert-danger">Error: {{$stocks}}<br>{{$requested}}</div>
            <a href="{{route('quotes')}}" class="btn btn-default">Try Again</a>
        @endif
    @else
        @yield('quoteForm')
        @if (Auth::check())
            <a href="{{route('home')}}" class="btn btn-default">Dashboard</a>
        @endif
    @endif
        </div>      
    </div>
@endsection