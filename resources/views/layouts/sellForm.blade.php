@section('sellForm')
	Current available funds: ${{money_format('%.2n', Auth::user()->cash)		       }}
        {{ Form::open(['action' => ['SellStockController@sellStocks']])                                                           	   }}
           Sell                                                                        
        {{ Form::number('sellAmount', '0')										       }}
           Shares of   
        @if(isset($_GET['name']))			
        {{ Form::select('stock', $formSelections, array_search($_GET['name'], $formSelections))}}
        @else
        {{ Form::select('stock', $formSelections)                                          }}
        @endif     
        <div class="form-group">                                     
        {{ Form::submit('Sell Stock', array('class' => 'btn btn-info text-center', 
         'onclick' => 'return confirm("Are you sure want to sell this stock?");'))     }}
        </div>
        {{ Form::close()														       }}
@endsection