@extends('layouts.try')

@section('content')
    <div class="container-fluid mx-2">
        <div class="row justify-content-around">
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3">
                    <div class="card" style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                                    Total Transaction
                            </div>
                            <div class="card-body"><div class="row justify-content-center">
                                    <h5 class="card-title"></h5>
                                    <a class="btn bg-primary" style="width:80%;"><strong>{{ $total_transaction }}</strong></a>    
                            </div>
                              </div>
                    </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3">
                    <div class="card" style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                              Total Amount Trade
                            </div>
                            <div class="card-body">
                              <h5 class="card-title "></h5>
                              <a class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3">
                    <div class="card " style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                              Total Profit
                            </div>
                            <div class="card-body">
                              <h5 class="card-title"></h5>
                              <a class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3" >
                    <div class="card " style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                             Total Expense
                            </div>
                            <div class="card-body">
                              <h5 class="card-title"></h5>
                              <a class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
            </div>
        </div>
        <div class = "row justify-content-around">
            
                <div class = "col-xs-12 col-sm-10 col-md-7 col-lg-7">
                    {{-- for graph --}}
                    <div class="container">
                        <canvas id="mychart"> </canvas>
                    </div>
                </div>
                <div class = "col-xs-12 col-sm-10 col-md-5 col-lg-5"> 
                        <div class="card mb-3 mx-4 mt-5" style="background-color:#c7ecee;">
                        <div class="card-header" style="background-color:#686de0;"><h4>{{Auth::user()->name}}'s Activity</h4></div>
                                <div class="card-body ">
                                  <h5 class="card-title"  style="color:#2c3e50;">Showing all log records</h5>
                                  <p class="card-text">
                                      <table class="table table-borderless table-hover">
                                            <thead>
                                              <tr class="row bg-info">
                                                <th class="col-1">#</th>
                                                <th class="col">Description</th>
                                                <th class="col-3">By</th>
                                                <th class="col-4">Date</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                             <?php $c = 0;?>
                                                  @foreach ($show_acts as $show_act)
                                                  <tr class="row">    
                                                  <th scope="row" class="col-1"><?php echo $c++; ?></th>
                                                  <td class="col">{{$show_act->description}}</td>
                                                  <td class="col-3"><a href="{{ url('user/'.Auth::user()->id) }}">{{ Auth::user()->name }}</a></td>
                                                  <td class="col-4">{{ $show_act->created_at }}</td>
                                                  
                                                </tr>
                                                  @endforeach
                                              
                                             
                                            </tbody>
                                          </table>
                                          <a href="">more...</a>
                                  </p>
                                </div>
                              </div>
                </div>
            </div>
        </div>
    </div>
 

@endsection