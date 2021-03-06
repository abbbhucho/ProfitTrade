@extends('layouts.try')

@section('content')
    <div class="container-fluid mx-2">
        <div class="row justify-content-around">
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3">
                    <div class="card" style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                                    <strong>Total Transaction</strong>
                                    
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
                                <strong>  Total Traded Value</strong>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h5 class="card-title "></h5>
                                <a class="btn btn-primary" style="width:80%;"><strong>{{ $total_traded_value }}</strong></a>
                                </div>    
                            </div>
                    </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3">
                    <div class="card " style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                                <strong> Total Profit </strong>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h5 class="card-title"></h5>
                                    <a class="btn btn-primary" style="width:80%;"><strong>{{ $profit_total }}</strong></a>
                                </div>
                            </div>
                    </div>
                              
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 pb-3" >
                    <div class="card " style="width: 12rem; background-color:#c7ecee;">
                            <div class="card-header" style="background-color:#686de0;">
                                <strong> Total Expense </strong>
                             </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h5 class="card-title"></h5>
                                    <a class="btn btn-primary" style="width:80%;"><strong>{{ $total_expense }}</strong></a>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
        <div class = "row justify-content-around">
            
                <div class = "col-xs-12 col-sm-10 col-md-7 col-lg-7 pt-4">
                    {{-- for graph --}}
                    <div class="container">
                            {!! $chart->container() !!}
                        {{-- <canvas id="myChart" width="635px" height="570px"> </canvas> --}}
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
                                                <th class="col-4">Description</th>
                                                <th class="col-3">By</th>
                                                <th class="col-3">Date</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                             <?php $c = 1;?>
                                                  @foreach ($show_acts as $show_act)
                                                  <tr class="row">    
                                                  <th scope="row" class="col-1"><?php echo $c++; ?></th>
                                                  <td class="col-4"><?php   $description = $show_act->description;
                                                                            if (strpos($description, 'created') !== false) {
                                                                                $words = explode(",", $description);
                                                                                echo $words[0]." ".$words[1]." a stock with name ".$words[2]."of quantity ".$words[3].$words[4]; 
                                                                            }
                                                                            elseif (strpos($description, 'updated') !== false) {
                                                                                $words = explode(",", $description);
                                                                                echo $words[0]." ".$words[1]." a stock with name ".$words[2]."of quantity ".$words[3].$words[4];                                                             
                                                                            }
                                                                            elseif (strpos($description, 'loggedin') !== false) {
                                                                                $words = explode(",", $description);
                                                                                echo Auth::user()->name." ".$words[0]." from ip".$words[1];
                                                                            }
                                                                            elseif (strpos($description, 'deleted') !== false) {
                                                                                $words = explode(",", $description);
                                                                                echo $words[0]." ".$words[1]." a stock with name ".$words[2]."of quantity ".$words[3].$words[4];                                                             
                                                                            }
                                                                            elseif (strpos($description, 'new_account_made') !== false) {
                                                                                $words = explode(",", $description);    
                                                                                echo "new account created ";
                                                                            }
                                                                            else{}
                                                                            ?></td>
                                                                    
                                                                    
                                                                    
                                                  <td class="col-3"><a href="{{ url('user/'.Auth::user()->id) }}">{{ Auth::user()->name }}</a></td>
                                                  <td class="col-3">{{ $show_act->created_at->diffForHumans() }}</td>
                                                  
                                                </tr>
                                                  @endforeach
                                              
                                             
                                            </tbody>
                                          </table>
                                        <a href="{{ url('/activities') }}">more...</a>
                                  </p>
                                </div>
                              </div>
                </div>
            </div>
        
    </div>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}
    {{-- <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['September', 'October', 'November', 'December'],
                    datasets: [{
                        label: '# of Transaction',
                        data: [0, 4, 0, 0],
                        backgroundColor: '#7ed6df',
                        borderColor: '#4834d4',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
    </script> --}}

@endsection