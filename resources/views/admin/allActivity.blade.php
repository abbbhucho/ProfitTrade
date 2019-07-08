@extends('layouts.try')

@section('content')



  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-xs-12 colsm-12 col-md-10 col-lg-10">
            <table class="table ">
                <thead>
                  <tr class="row bg-success" >
                      <th class="col-1">#</th>
                      <th class="col">Log Message</th>
                      <th class="col-2">By</th>
                      <th class="col-2">Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $c = 1;?>
                  @foreach ($logs as $log)
                  
                 
                  <tr class="row">    
                      <th scope="row" class="col-1"><?php echo $c++; ?></th>
                      <td class="col"><?php   $description = $log->description;
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
                      <td class="col-2"><a href="{{ url('user/'.$log->user_id) }}">{{ $log->user_id }}</a></td>
                      <td class="col-2">{{$log->created_at->diffForHumans()}}</td>
                  </tr>
                        
                  @endforeach
                  
                </tbody>
              </table>
          </div>
      </div>
  </div>           
    
 


@endsection