@extends('layouts.try')

@section('content')
    
<br><br>
<div class="container-fluid">
	<div class="row">
        <div class="col-xs-4" >
		    <img src="http://www.svpnpa.gov.in/images/npa/alumni-gallery/1956/R.M.Rao.png" class="img-circle" height= "150px">
        </div>
        @foreach ($unique_users as $unique_user )
            <div class="col-xs-8">
                <h3>{{ $unique_user->name }}</h3>
                <h6>Email: {{ $unique_user->email }} </h6>
                <h6>Phone: {{ $unique_user->phone }} </h6>
                <h6>Phone: {{ $unique_user->address }} </h6>
                <h6>Old: <?php $current_time = strtotime("$present_time");
                                $created_time = strtotime("$unique_user->created_at");
                                $minutes = round((abs($current_time - $created_time / 60)),2);
                                
                                if($minutes<60){
                                    echo round($minutes,0)." minutes ago";
                                }elseif($minutes < 24*60){
                                    echo round(($minutes/60),2)." hours ago";    
                                }
                                elseif($minutes < 24*60*365){
                                    echo round($minutes/(1440),0)." days ago";    
                                }
                                else{
                                    echo round($minutes/(525600),0)." years ago"; 
                                }
                             ?></h6>
                
            </div>
                
        @endforeach
       
        
        <div class="col-xs-6">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>
</div>
</div>




@endsection