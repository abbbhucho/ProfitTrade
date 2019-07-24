@extends('layouts.try')

@section('content')

<div class="jumbotron">
        
        <h2>Stock History</h2>
        <p>The Stock History shows all the details of the particular user:</p>                        
</div>

                        <table id="history" class="table  table-bordered table-striped table-condensed table-hover">
                            <thead>
                            <col>
                            
                            <colgroup span="2"></colgroup>
                            <colgroup span="2"></colgroup>
                            <tr>
                                <td rowspan = "1"></td>
                                <th colspan="8" scope="colgroup"><center>Buy</center></th>
                                <th colspan="8" scope="colgroup"><center>Sell</center></th>
                            </tr>    
                            <tr>
                                <th>#</th>
                                <th scope="col">Stock Name</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col" class="col-1">Gross Total</th>
                                <th scope="col" class="col-3">Extra Charges Applied</th>
                                <th scope="col">NetTotal</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Gross Total</th>
                                <th scope="col" class="col-3">Extra Charges Applied</th>
                                <th scope="col">NET Charges</th>
                                <th scope="col">Profit</th>
                                <th scope="col">Sell Date</th>
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
                                    <td class=col-1>{{$stock->buy_gross_total}}</td>
                                    <td  class="col-3"><p>STT Charges : {{ round($stock->buy_stt_total,2) }}</p>
                                    <p>SD Charges : {{ round($stock->buy_sd_total,2) }}</p>
                                    <p>Brokerage : {{ round($stock->buy_b_total,2) }}</p>
                                    <p>Transaction Charges : {{ round($stock->buy_tc_total,2) }}</p>
                                    <p>GST : {{ round($stock->buy_gst_total,2) }}</p></td>
                                    <td>{{ round($stock->buy_net_total,2) }}</td>
                                    <td>{{ round($stock->sell_price,2) }}</td>
                                    <td>{{ round($stock->sell_quantity,2 )}}</td>
                                    <td>{{ round($stock->sell_gross_total,2) }}</td>
                                    <td class="col-3"><p>STT Charges : {{ round($stock->sell_stt_total,2) }}</p>
                                    <p>SD Charges : {{ round($stock->sell_sd_total,2) }}</p>
                                    <p>Brokerage : {{ round($stock->sell_b_total,2) }}</p>
                                    <p>Transaction Charges : {{ round($stock->sell_tc_total,2) }}</p>
                                    <p>GST : {{ round($stock->sell_gst_total,2) }}</p></td>
                                    <td>{{ round($stock->sell_net_total,2) }}</td>
                                    <td>{{ round($stock->profit,2) }}</td>
                                    <td>{{$stock->updated_at->diffForHumans() }}</td>
                                    @endif
                            </tr> 
                                @endforeach
                            
                            </tbody>
                        </table>
                   
    @endsection
    