@extends('layouts.try')

@section('content')
<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>Stock ViewPort</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordered table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                        <th>S No.</th>
                        <th>Stock Name</th>
                        <th>Original Quantity</th>
                        <th>Stock Price</th>
                        <th>Stocks Left</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Sell</th>
                        <th>Delete</th>
                   </thead>
    <tbody>
    
    <?php $c = 0;?>
        
            @if(count($views) > 0)
                @foreach($views as $view)
                    <?php $c++; ?>
                 
        <tr class="post{{$view->id}}">
                    <td>{{ $c }}</td>
                    <td>{{ $view->stock_name }}</td>
                    <td>{{ $view->buy_quantity }}</td>
                    <td>{{ $view->buy_price }}</td>
                    <td>{{ $view->buy_quantity }}</td>
                    
                    
                    <td><p data-placement="top" data-toggle="tooltip" title="View"><a href="#" class="show-modal btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal{{$view->id}}"><i class="fas fa-eye"></i></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="#" class="edit-modal btn btn-primary btn-xs" data-id="{{$view->id}}" data-toggle="modal" data-target="#editModal{{$view->id}}"><i class="fas fa-edit"></i></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Sell"><a href="#" class="edit-modal btn btn-warning btn-xs" data-id="{{$view->id}}" data-toggle="modal" data-target="#sellModal{{$view->id}}"><i class="fas fa-dollar-sign"></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" class="show-modal btn btn-danger btn-xs" data-id="{{$view->id}}" data-toggle="modal" data-target="#deleteModal{{$view->id}}"><i class="fas fa-trash"></i></a></td>
        </div>
	</div>
</div>
{{--  ------------------------------------------------View------------------------------------------------------------- --}}
<div class="modal fade" id="viewModal{{$view->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
   

  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">View The Stock Detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
        <p># : {{$view->id}}</p>
        <p>Stock Name : {{$view->stock_name}}</p>
        <p>Stock Quantity : {{$view->buy_quantity}}</p>
        <p>Buy Price : {{$view->buy_price}}</p>
        @if( $view->nse_or_bse == 0 )
                        <p>{{ 'NSE' }}</p>
                    @else
                    
                        <p>{{ 'BSE' }}</p>
                    
                    @endif
        <p>Gross Total :{{ $view->buy_gross_total }}</p>
        <p>STT Applied : {{ $view->buy_stt_total }}</p>
        <p>SD Applied : {{ $view->buy_sd_total }}</p>
        <p>Brokerage Applied : {{ $view->buy_b_total }}</p>
        <p>Transaction Charges : {{$view->buy_tc_total}}</p>
        <p>GST Applied : {{$view->buy_gst_total}}</p>
        <p>NetTotal at purchase : {{$view->buy_net_total}}</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
{{--  ------------------------------------------------Edit------------------------------------------------------------ --}}
<div class="modal fade" id="editModal{{$view->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="row justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-pencil-alt"></span></i></button>
            <h4 class="modal-title custom_align" id="Heading">Edit Your Stocks</h4>
            </div>
        </div>
        <div class="modal-body">
<<<<<<< HEAD
            <form class="form-horizontal" role="modal" method="post" action="{{ url('dashboard/'.$view->id) }}">
=======
            <form class="form-horizontal" role="modal" method="post" action="{{ action('Stock_detailController@update',['id',$view->id]) }}">
>>>>>>> ed004f3f65aa6f727128eac6c3ec435874d67142
            {{ csrf_field() }}
             {{ method_field('PUT') }}
            <div class="form-group row add justify-content-center">

            <input class="form-control" type="text" id="name" name="stock_name" placeholder="Stock Name" pattern="/^\p{L}+$/u" style="width: 80%;">
            {{-- <!-- <p class="error text-center alert alert-danger hidden"></p>  -->--}}
        </div>
        <div class="form-group row justify-content-center">
            <input class="form-control" type="number" id="quantity" name="buy_stock_quantity" placeholder="Stock Quantity" pattern="^[0-9]+$" style="width: 80%;">
            {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
        </div>
        <div class="form-group row justify-content-center">
            <input class="form-control" type="number" id="price" name="buy_stock_price" placeholder="Purchase Stock Price"  style="width: 80%;">   
            {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
        </div>
        <div class="form-group row justify-content-center">
            <input class="form-control" type="number" id="sell_quantity" name="sell_stock_quantity" placeholder="Sell Stock Quantity" pattern="^[0-9]+$" style="width: 80%;">   
            {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
        </div>
        <div class="form-group row justify-content-center">
            <input class="form-control" type="number" id="sell_price" name="sell_stock_price" placeholder="Sell Stock Price"  style="width: 80%;">   
            {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
        </div>
        <div class="row justify-content-center">

<<<<<<< HEAD
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultChecked" name="nse_or_bse" value="0" checked>
                <label class="custom-control-label  col-sm-4" for="defaultChecked"> NSE </label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultUnchecked" name="nse_or_bse" value="1">
=======
            <div class="custom-control custom-radio ">
                <input type="radio" class="custom-control-input" id="defaultradio" name="nse_or_bse" value="NSE" checked>
                <label class="custom-control-label  col-sm-4" for="defaultChecked"> NSE </label>
            </div>
            <div class="custom-control custom-radio ">
                <input type="radio" class="custom-control-input" id="defaultradio" name="nse_or_bse" value="BSE">
>>>>>>> ed004f3f65aa6f727128eac6c3ec435874d67142
                <label class="custom-control-label  col-sm-4" for="defaultUnchecked"> BSE </label>
            </div>
        </div>
       

        </div>   
            <div class="modal-footer">
                <button type="submit" id="update" class="btn btn-warning btn-lg" style="width: 40%;"><i class="fas fa-check"></i> Update</button>
            </div>
        </form>
        
    <!-- modal-content --> 
  </div>
      <!-- modal-dialog --> 
    </div>
</div>
    {{-- ----------------------------------------------Sell-------------------------------------------------------- --}}
    <div class="modal fade" id="sellModal{{$view->id}}" role="dialog" tabindex="-1" aria-labelledby="sell" aria-hidden="true">
   
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-dollar-sign"></i></span></button>
                <h4 class="modal-title custom_align" id="Heading">Sell Your Stocks</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <p class="form-control" readonly>{{ $view->stock_name }}</p>
            </div>
            <div class="form-group">
                <p class="form-control"  readonly>Buy Quantity: {{ $view->buy_quantity }}</p>
            </div>
            
            <div class="form-group">
                <p class="form-control"  readonly>Bought time:  <?php $cur_time = strtotime("$current_time");
                                                                    $created_time = strtotime("$view->created_at");
                                                                    $minutes = (round(abs(($cur_time - $created_time) / 60),2)." minutes ago";
                                                                    
                                                                     if($minutes<60){
                                                                         echo round($minutes,0)." minutes ago";
                                                                     }elseif($minutes < 24*60){
                                                                         echo round(($minutes/60),2)." hours ago";    
                                                                     }
                                                                     else{
                                                                         echo round($minutes/(60*24),0)." days ago";    
                                                                    }
                                                                   ?>
                
                </p>
            </div>
            
            <div class="form-group">
                <input class="form-control" type="text" name="sell_stock_quantity" placeholder="Stock Quantity to Sell" pattern="/^[0-9]+$/igm">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="sell_price" placeholder="Sell Stock Amount : buyamount is {{ $view->buy_price }} " pattern="/^(\d*\.)?\d+$/igm">   
            </div>
            
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg" style="width: 40%;"><i class="fas fa-check"></i> Sell</button>
            </div>
        </div>
     
  </div>
     
    </div>
{{--<!--     
    <form id = "deleteStocks" action="{{ route('dashboard/'{{$views->}}') }}" method="post">
    @csrf
    </form> -->--}}
    {{--  ----------------------------Delete----------------------------------  --}}
    <div class="modal fade" id="deleteModal{{$view->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
     <form action="{{ action('Stock_detailController@destroy',['id'=>$view->id]) }}" method="post" id="form1"> 
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
         {{--<!-- url('dashboard/delete/'.$view->id) -->--}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-trash"></i></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this Stock</h4>
                </div>
                <div class="modal-body">       
                    <div class="alert alert-danger"><i class="fas fa-exclamation fa-2x"></i> Are you sure you want to delete this Record?</div>       
                    <span class="hidden id"></span>
                    

                   
                    
                
                </div>
                <div class="modal-footer ">
                    <input type="submit" class="btn btn-danger" value="YES"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-eraser"></i> No</button>
                
                  
                </div>
            </div>
         
        </div>
        </form>
    </div>
    @endforeach
            @else
                <div class="alert alert-warning">
                    <strong>User</strong> You Don't have any stocks.
                </div>       
            @endif
            
        </tbody>
        
        </table>   

@endsection
