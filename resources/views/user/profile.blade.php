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
                <h6>Old: {{$unique_user->created_at->diffForHumans()}}</h6>
                
            </div>
                
        @endforeach
       
        
       
</div>
</div>




@endsection