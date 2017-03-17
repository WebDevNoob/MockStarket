@extends('layouts.app')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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