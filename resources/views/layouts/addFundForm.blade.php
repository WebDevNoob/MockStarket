@section('addFundForm')
	Current available funds: ${{money_format('%.2n', Auth::user()->cash)		  }}
        {{ Form::open() 													      }}
        {{ Form::number('amount','$')										  }}  
        {{ Form::submit('Add Funds', array('class' => 'btn btn-info text-center'))}}
        {{ Form::close()														  }}
@endsection