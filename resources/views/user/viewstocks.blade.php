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
    
        
        
            @if(count($views) > 0)
                @foreach($views as $view)
                <?php $c = 0;
                $c++; ?>
        <tr class="post{{$view->id}}">
                    <td>{{ $c }}</td>
                    <td>{{ $view->stock_name }}</td>
                    <td>{{ $view->buy_quantity }}</td>
                    <td>{{ $view->buy_price }}</td>
                    <td>{{ $view->buy_quantity }}</td>
                    
                    
                    <td><p data-placement="top" data-toggle="tooltip" title="View"><a href="#" class="show-modal btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal{{$view->id}}"><i class="fas fa-eye"></i></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="#" class="edit-modal btn btn-primary btn-xs" data-id="{{$view->id}}" data-name="{{$view->stock_name}}" data-quantity="{{ $view->buy_quantity }}" data-price = "{{ $view->buy_quantity }}" data-toggle="modal" data-target="#editModal{{$view->id}}"><i class="fas fa-edit"></i></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Sell"><a href="#" class="edit-modal btn btn-warning btn-xs" data-id="{{$view->id}}" data-name="{{$view->stock_name}}" data-quantity="{{ $view->buy_quantity }}" data-price = "{{ $view->buy_quantity }}" data-toggle="modal" data-target="#sellModal{{$view->id}}"><i class="fas fa-dollar-sign"></a></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" class="show-modal btn btn-danger btn-xs" data-id="{{$view->id}}" data-name="{{$view->stock_name}}" data-quantity="{{ $view->buy_quantity }}" data-price = "{{ $view->buy_quantity }}" data-toggle="modal" data-target="#deleteModal{{$view->id}}"><i class="fas fa-trash"></i></a></td>
                     
                    
                   
        </tr>

   
    
   
    

       
            </div>
            
        </div>
	</div>
</div>
<!-- ------------------------------------------------View------------------------------------------------------------- -->
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
<!-- ------------------------------------------------Edit------------------------------------------------------------ -->
<div class="modal fade" id="editModal{{$view->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-pencil-alt"></span></i></button>
            <h4 class="modal-title custom_align" id="Heading">Edit Your Stocks</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="modal" method="post" action="{{Route('editStocks',['id',$view->id])}}">
                @csrf
            <div class="form-group row add">
            <input type="hidden" id="id" name="id">

            <input class="form-control" type="text" id="name" name="stock_name" placeholder="Stock Name" pattern="/^\p{L}+$/u">
            {{--<!-- //<p class="error text-center alert alert-danger hidden"></p> -->--}}
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="quantity" name="buy_stock_quantity" placeholder="Stock Quantity" pattern="^[0-9]+$">
            {{--<!--<p class="error text-center alert alert-danger hidden"></p>-->--}}
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="price" name="buy_stock_price" placeholder="Purchase Stock Price" pattern="^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$">   
            {{--<!--<p class="error text-center alert alert-danger hidden"></p>-->--}}
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="sell_quantity" name="sell_stock_quantity" placeholder="Sell Stock Quantity" pattern="^[0-9]+$">   
            {{--<!--<p class="error text-center alert alert-danger hidden"></p>-->--}}
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="sell_price" name="sell_stock_price" placeholder="Sell Stock Price" pattern="^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$">   
            {{--<!--<p class="error text-center alert alert-danger hidden"></p>-->--}}
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultradio" name="nse_or_bse" value="NSE" checked>
            <label class="custom-control-label  col-sm-6" for="defaultChecked"> National Stock Exchange </label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultradio" name="nse_or_bse" value="BSE">
            <label class="custom-control-label  col-sm-6" for="defaultUnchecked"> Bombay Stock Exchange </label>
        </div>
        </form>

        </div>   
            <div class="modal-footer">
                <button type="submit" id="update" class="btn btn-warning btn-lg" style="width: 40%;"><i class="fas fa-check"></i> Update</button>
            </div>
        
        
    <!-- modal-content --> 
  </div>
      <!-- modal-dialog --> 
    </div>
</div>
    <!-- ----------------------------------------------Sell-------------------------------------------------------- -->
    <div class="modal fade" id="sellModal{{$view->id}}" role="dialog" tabindex="-1" aria-labelledby="sell" aria-hidden="true">
   
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-dollar-sign"></i></span></button>
                <h4 class="modal-title custom_align" id="Heading">Sell Your Stocks</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <input class="form-control" type="text" name="stock_name" placeholder="Stock Name" pattern="/^\p{L}+$/u">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="buy_stock_quantity" placeholder="Stock Quantity" pattern="^[0-9]+$">
            </div>
            <div class="form-group">
            <input class="form-control" type="text" name="buy_stock_quantity" placeholder="Sell Stock Amount" pattern="^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$">   
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
    <!-- ----------------------------Delete---------------------------------- -->
    <div class="modal fade" id="deleteModal{{$view->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
     <form action="{{ url('dashboard/delete/'.$view->id) }}" method="post" id="form1"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-trash"></i></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this Stock</h4>
                </div>
                <div class="modal-body">       
                    <div class="alert alert-danger"><i class="fas fa-exclamation fa-2x"></i> Are you sure you want to delete this Record?</div>       
                    <span class="hidden id"></span>
                    
                    @csrf
                    <input type="submit" class="btn btn-danger" value="YES" onclick="document.getElementById('form1').submit();">
                 
                
                </div>
                <div class="modal-footer ">
                   <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-eraser"></i> No</button>
                
                  
                </div>
            </div>
            <!-- It's script is inside layouts/app.blade.php --> 
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