@extends('layouts.app')
@include('layouts.sellForm')

@section('content')

<div class="offset-md-2">
    <div class="container">
            <div class="panel panel-default text-left">
                <div class="panel-heading">
                	Selling Stocks
                </div>
                <div class="panel-body">
                    <div class="content">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    	<center>@yield('sellForm')</center>
                    </div>
                </div>
            </div>
    </div>
</div>                


@endsection