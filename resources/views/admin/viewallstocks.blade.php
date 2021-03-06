@extends('layouts.try')

@section('content')

<div class="jumbotron">
        
        <h2>View All Stocks</h2>
        <p>All the Stocks which are fulfilled : </p>                        
</div>
        <div class="row">
            <div class="col-xs-12">
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
                            <tr >
                                <th>#</th>
                                <th >Stock Name</th>
                                <th >Stock Quantity</th>
                                <th >Price</th>
                                <th >Type</th>
                                <th >Gross Total</th>
                                <th>Extra Charges Applied</th>
                                {{-- <th >STT Applied</th>
                                <th >SD Applied</th>
                                <th >Brokerage Applied</th>
                                <th >Transaction Charges</th>
                                <th >GST Charges</th> --}}
                                <th >NetTotal</th>
                                <th >Price</th>
                                <th >Quantity</th>
                                <th >Gross Total</th>
                                <th>Extra Charges Applied</th>
                                {{-- <th >STT Applied</th>
                                <th >SD Applied</th>
                                <th >Brokerage Applied</th>
                                <th >Transaction Charges</th>
                                <th >GST Charges</th> --}}
                                <th >NET Charges</th>
                                <th >Profit/Loss</th>
                                <th >Sell Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                
                                    @foreach($stocks as $stock)
                                        @if($stock->fulfilled == 1)
                            <tr >
                               
                                    <td >{{$stock->id}}</td>
                                    <td >{{$stock->stock_name}}</td>
                                    <td >{{$stock->buy_quantity}}</td>
                                    <td >{{$stock->buy_price}}</td>
                                        @if( $stock->nse_or_bse == 0 )
                                            <td >{{ 'NSE' }}</td>
                                        @else
                                        
                                            <td>{{ 'BSE' }}</td>
                                        
                                        @endif
                                    <td >{{$stock->buy_gross_total}}</td>                    
                                    <td ><p>STT Charges : {{number_format($stock->buy_stt_total,8)}}</p>
                                    <p>SD Charges : {{(float) $stock->buy_sd_total}}</p>
                                    <p>Brokerage : {{(float) $stock->buy_b_total}}</p>
                                    <p>Transaction Charges : {{(float) $stock->buy_tc_total}}</p>
                                    <p>GST : {{(float) $stock->buy_gst_total}}</p></td>
                                    <td >{{$stock->buy_net_total}}</td>
                                    <td >{{$stock->sell_price}}</td>
                                    <td >{{$stock->sell_quantity}}</td>
                                    <td >{{$stock->sell_gross_total}}</td>
                                    <td ><p>STT Charges : {{(float) $stock->sell_stt_total}}</p>
                                    <p>SD Charges : {{(float) $stock->sell_sd_total}}</p>
                                    <p>Brokerage : {{(float) $stock->sell_b_total}}</p>
                                    <p>Transaction Charges : {{(float) $stock->sell_tc_total}}</p>
                                    <p>GST : {{(float) $stock->sell_gst_total}}</p></td>
                                    <td >{{(float) $stock->sell_net_total}}</td>
                                    <td >{{$stock->profit}}</td>
                                    <td >{{$stock->updated_at->diffForHumans()}}</td>
                                    @endif
                            </tr> 
                            @endforeach
                            
                            </tbody>
                        </table>
                   
            </div>
        </div>   

                        
                                
@endsection