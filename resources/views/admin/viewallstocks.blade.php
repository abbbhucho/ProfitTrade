@extends('layouts.try')

@section('content')

<div class="jumbotron">
        
        <h2>View All Stocks</h2>
        <p>All the Stocks which are fulfilled : </p>                        
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">

                        <table id="history" class="table table-bordered table-striped table-condensed table-hover">
                            <thead>
                            <col>
                            
                            <colgroup span="2"></colgroup>
                            <colgroup span="2"></colgroup>
                            <tr>
                                <td rowspan = "1"></td>
                                <th colspan="11" scope="colgroup"><center>Buy</center></th>
                                <th colspan="11" scope="colgroup"><center>Sell</center></th>
                            </tr>    
                            <tr>
                                <th>#</th>
                                <th scope="col">Stock Name</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">Gross Total</th>
                                <th scope="col">STT Applied</th>
                                <th scope="col">SD Applied</th>
                                <th scope="col">Brokerage Applied</th>
                                <th scope="col">Transaction Charges</th>
                                <th scope="col">GST Charges</th>
                                <th scope="col">NetTotal</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Gross Total</th>
                                <th scope="col">STT Applied</th>
                                <th scope="col">SD Applied</th>
                                <th scope="col">Brokerage Applied</th>
                                <th scope="col">Transaction Charges</th>
                                <th scope="col">GST Charges</th>
                                <th scope="col">NET Charges</th>
                                <th scope="col">Sell Date</th>
                                <th scope="col">Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                
                                    @foreach($stocks as $stock)
                                        @if($stock->fulfilled == 1)
                            <tr>
                               
                                    <td>{{$stock->id}}</td>
                                    <td>{{$stock->stock_name}}</td>
                                    <td>{{$stock->buy_quantity}}</td>
                                    <td>{{$stock->buy_price}}</td>
                                        @if( $stock->nse_or_bse == 0 )
                                            <td>{{ 'NSE' }}</td>
                                        @else
                                        
                                            <td>{{ 'BSE' }}</td>
                                        
                                        @endif
                                    <td>{{$stock->buy_gross_total}}</td>
                                    <td>{{number_format($stock->buy_stt_total,8)}}</td>
                                    <td>{{(float) $stock->buy_sd_total}}</td>
                                    <td>{{(float) $stock->buy_b_total}}</td>
                                    <td>{{(float) $stock->buy_tc_total}}</td>
                                    <td>{{(float) $stock->buy_gst_total}}</td>
                                    <td>{{$stock->buy_net_total}}</td>
                                    <td>{{$stock->sell_price}}</td>
                                    <td>{{$stock->sell_quantity}}</td>
                                    <td>{{$stock->sell_gross_total}}</td>
                                    <td>{{(float) $stock->sell_stt_total}}</td>
                                    <td>{{(float) $stock->sell_sd_total}}</td>
                                    <td>{{(float) $stock->sell_b_total}}</td>
                                    <td>{{(float) $stock->sell_tc_total}}</td>
                                    <td>{{(float) $stock->sell_gst_total}}</td>
                                    <td>{{(float) $stock->sell_net_total}}</td>
                                    <td>{{$stock->profit}}</td>
                                    <td>{{$stock->updated_at}}</td>
                                    @endif
                            </tr> 
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>     
        </div>
    </div>
@endsection