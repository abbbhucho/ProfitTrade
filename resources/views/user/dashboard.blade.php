@extends('layouts.try')
@section('content')
<!-- Material form register -->
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-10">
      <div class="card">

        <h5 class="card-header text-center py-4" style="background-color:#ffbe76;">
            <strong>Stock Entry</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" action="{{route('dashboard')}}" method="post" style="color: #757575;">
            @csrf
                
                    @if(count($errors) > 0) : 
                        <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all() as $errors)
                            <li>
                              {{ $errors }}
                            </li>
                            @endforeach
                          </ul>
                        </div>
                    @endif

                    @if($message = Session::get('success')) : 
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    {{--<!--Stock Name-->--}}  
                <div class="row justify-content-center">    
                  <div class="md-form mt-5 mb-5 col-md-6 {{ $errors->has('stock_name') ? 'has-error' : '' }}">
                    <input type="text" id="stock_name" name="stock_name" class="form-control validate" required>
                        @if ($errors->has('stock_name'))
                          <span class="text-danger">{{ $errors->first('stock_name') }}</span>
                        @endif
                    <label data-error="wrong" data-success="right" for="stock_name">{{__('Stock name') }}</label>
                  </div>      
                </div>

                {{--<!--Purchase Stock Quantity-->--}} 
                <div class="row justify-content-center">  
                  <div class="md-form mb-5 col-md-6 {{$errors->has('stock_quantity') ? 'has-error' : '' }}">
                    <input type="text" id="purchase_stock_quantity" name="stock_quantity" class="form-control validate" required>
                      @if ($errors->has('stock_quantity'))
                          <span class="text-danger">{{ $errors->first('stock_quantity') }}</span>
                      @endif
                      <label data-error="wrong" data-success="right" for="purchase_stock_quantity">{{__('Purchase Stock Quantity') }}</label>
                  </div>
                </div>      
                {{--<!--Purchase Stock Price-->--}} 
                <div class="row justify-content-center">
                  <div class="md-form mb-5 col-md-6 {{ $errors->has('stock_price') ? 'has-error' : '' }}">
                      <input type="text" id="purchase_stock_price" name="stock_price" class="form-control validate" required>
                        @if ($errors->has('stock_price'))
                            <span class="text-danger">{{ $errors->first('stock_price') }}</span>
                        @endif
                        <label data-error="wrong" data-success="right" for="purchase_stock_price">{{__('Purchase Stock Price') }}</label>
                  </div>
                </div>
                {{--<!--Sell Stock Quantity-->--}}
                <div class="row justify-content-center">
                  <div class="md-form mb-5 col-md-6 {{ $errors->has('sell_stock_quantity') ? 'has-error' : '' }}">
                    <input type="text" id="sell_stock_quantity" name="sell_stock_quantity" class="form-control validate" >
                    @if ($errors->has('stock_price'))
                        <span class="text-danger">{{ $errors->first('sell_stock_quantity') }}</span>
                    @endif
                    <label data-error="wrong" data-success="right" for="sell_stock_quantity">{{__('Sell Stock Quantity') }}</label>
                  </div>
                </div>      
              
                {{--<!--Sell Stock Price-->--}} 
                <div class="row justify-content-center">  
                  <div class="md-form mb-5 col-md-6 {{ $errors->has('sell_stock_price') ? 'has-error' : '' }}">
                        <input type="text" id="orangeForm-name" name="sell_stock_price" class="form-control validate" >
                            @if ($errors->has('stock_price'))
                                <span class="text-danger">{{ $errors->first('sell_stock_price') }}</span>
                            @endif
                        <label data-error="wrong" data-success="right" for="orangeForm-name">{{__('Sell Stock Price') }}</label>
                  </div>
                </div>        
                {{--<!--radio buttons-------------------------------for NSE, value is set to 0-->--}} 
                <div class="row justify-content-center">
                  <div class="form-check form-row mb-4">
                    <div class="col-md-3">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="0" checked>
                      <label class="myradio" for="exampleRadios1">NSE </label>
                    </div>   
                    <div class="col-md-3">      
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="1">
                      <label class="myradio" for="exampleRadios2">BSE </label>  
                    </div>                
                  </div>
                </div>      
                <!-- Sign up button -->
                <div class="row justify-content-center">
                  <button class="col-md-4 btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">{{__('Submit') }}</button>
                </div>
            </form>
            <!-- Form -->

        </div>
    </div>
  </div>
  </div>
</div>  




@endsection



   