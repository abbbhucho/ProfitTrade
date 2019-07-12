@extends('layouts.try')

@section('content')
<style>

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
                <?php $c=1;?>
                @foreach($costs as $cost)
                <h1  class="display-4">@if ($cost->id == 1)
                    NSE
                @else
                    BSE
                @endif</h1>
                <table class="table">
              
                        <tr>
                          <th class="col-1">#</th>
                          <th class="col-2"> Buy SD Percent</th>
                          <th class="col-2"> Buy STT Percent</th>
                          <th class="col-2"> Buy Brokerage Charges</th>
                          <th class="col-2">GST when bought</th>
                          <th class="col-2"> Buy Transaction Charges</th>
                          <th class="col-2"> Sell SD Percent</th>
                          <th class="col-2">Sell STT Percent</th>
                          <th class="col-2">Sell Brokerage Charges</th>
                          <th class="col-2">GST at time of selling</th>
                          <th class="col-2">Sell Transaction Charges</th>
                        </tr>
                     
                        <tr>
                          <th class="col-1">{{ $c++ }}</th>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_buy_sd_percent}}
                          <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_buy_sd_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_buy_stt_percent}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_buy_stt_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_buy_b_percent}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6 class="text-primary">{{$cost->del_buy_b_percent}}</td>
                          <td class="col-2">{{$cost->buy_gst_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_buy_trans_charges}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_buy_trans_charges}}</td>
                           <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_sell_sd_percent}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_sell_sd_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_sell_stt_percent}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_sell_stt_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_sell_b_percent}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_sell_b_percent}}</td>
                          <td class="col-2">{{$cost->sell_gst_percent}}</td>
                          <td class="col-2"><h6 class="text-primary"><strong>Intraday</strong></h6>{{$cost->intra_sell_trans_charges}}
                            <h6 class="text-primary"><strong>Deliveryday</strong></h6>{{$cost->del_sell_trans_charges}}</td>
                        </tr>
                        
                        
                      
                </table>  
                @endforeach  
        </div>    
    </div>
       
</div>
@endsection