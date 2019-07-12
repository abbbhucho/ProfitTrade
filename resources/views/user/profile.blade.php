@extends('layouts.try')

@section('content')
    
<br><br>
<div class="container-fluid">
	<div class="row justify-content-center">
        <div class="col-xs-6  col-md-offset-1 col-md-4 col-sm-6 col-lg-4" >
               
            <img src="{{url('images/'.Auth::user()->avatar) }}" class="img-circle" height= "150px">
        
        </div>
        @foreach ($unique_users as $unique_user )
            <div class="col-xs-6 col-md-6 col-sm-6 col-lg-offset-1 col-lg-6">
                <h3>{{ $unique_user->name }} </h3><small><cite > {{ $unique_user->address }}&emsp;&emsp;<i class="fas fa-map-marker-alt"></i></cite></small>
                <p>
                    <h6><i class="fas fa-envelope"></i>&emsp;Email: {{ $unique_user->email }} </h6>
                    <h6><i class="fas fa-phone-alt"></i>&emsp;Phone: {{ $unique_user->phone }} </h6><br />
                
                    <h6>Old: {{$unique_user->created_at->diffForHumans()}}</h6><br />
                </p>    
                @if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editprofile{{ $unique_user->id }}">
                        Edit Profile
                      </button>
                      <form class="form-horizontal" role="modal" method="post" action="{{ url('user/'.$unique_user->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         {{ method_field('PATCH') }}
                      <div class="modal fade" id="editprofile{{ $unique_user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold" id="edittext">Edit Profile</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body mx-3">
                              <div class="row justify-content-around">
                                    <div class="md-form mb-5">
                                            
                                            <input type="text" id="name" name="name" class="form-control validate form-control-lg" value="{{ $unique_user->name }}">
                                            <label data-error="wrong" data-success="right" for="name" ><strong>Enter name</strong></label>
                                    </div>
                              </div>
                              <div class="row justify-content-around"> 
                                <div class="md-form mb-5">
                                  
                                  <div class="form-control validate form-control-lg text-muted"><i class="fas fa-envelope prefix grey-text"></i>&emsp; &emsp;{{ $unique_user->email }}</div>
                                  
                                </div>
                            </div>
                            <div class="row justify-content-center"> 
                                <div class="md-form mb-4">
                                 
                                  <input type="number" id="number" class="form-control validate form-control-lg" name="phone" value="{{ $unique_user->phone }}">
                                  <label data-error="wrong" data-success="right" for="number"><strong>Enter phone number</strong></label>
                                </div>
                            </div>
                            <div class="row justify-content-center"> 
                                <div class="md-form mb-4">
                                       
                                        <input type="text" id="address" class="form-control validate form-control-lg" name="address" value="{{ $unique_user->address }}">
                                        <label data-error="wrong" data-success="right" for="address"><strong>Enter address</strong></label>
                                </div>
                            </div>
                            <div class="row justify-content-center"> 
                                    <div>
                                           
                                            <input type="file" id="avatar" class="form-control validate form-control-lg" name="avatar">
                                            
                                    </div>
                            </div>

                              </div>
                          <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        @endforeach
       
        
       
</div>
</div>



@endsection