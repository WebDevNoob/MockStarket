@section('quoteForm')
        {{ Form::open(['method' => 'GET'])}}
        {{ Form::text('symbol','',array('placeholder'=>'Stock Symbol','class'=>' textarea input-sm','required','autofocus'))}}  
        {{ Form::submit('Get Quote', array('class' => 'btn btn-info text-center'))}}
        {{Form::close()}}
@endsection