@extends('layouts.app')

@include('layouts.addFundForm')

@section('content')
    <div class="container">
        <div class="row text-center">
            <h3>Add Funds</h3>
        </div>    
        <div class="row text-center">
    		@yield('addFundForm')
		</div>
	</div>
@endsection