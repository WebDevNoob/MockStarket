@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="card text-center">
            <div class="card-header default-color-dark white-text">Quotes</div>
                <div class="panel-body">
@if(isset($stocks))

                <p class="text-danger">
                {{$stocks["name"]}}
                {{$stocks["symbol"]}}
                {{$stocks["price"]}}
                </p>
                <a href="{{route('quotes')}}" class="btn btn-default">Get Another Quote</a>
                </div>
@else
                {{ Form::open()}}
                {{ Form::text('symbol','',array('placeholder'=>'Stock Symbol','class'=>'form-control','required','autofocus'))}}
                {{ Form::token()}}
                </div> 
                <div class='flex-row'>
                {{ Form::submit('Get Quote', array('class'=>'btn btn-primary'))}} 
                {{Form::close()}}
                </div>
@endif                    
            </div>
        </div>
    </div>
</div>
@endsection


   