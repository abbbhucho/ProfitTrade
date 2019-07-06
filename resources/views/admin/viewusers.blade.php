@extends('layouts.try')

@section('content')

<div class="container">
        <div class="row">
            
            
            <div class="col-md-12">
            <h4>Users List</h4>
            <div class="table-responsive">
    
                    
                  <table id="mytable" class="table table-bordered table-striped">
                       
                       <thead>
                       
                       <!-- <th><input type="checkbox" id="checkall" /></th> -->
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Profile</th>
                            <th>Edit</th>
                            <th>Delete</th>
                       </thead>
        <tbody>
        
        <?php $c = 0;?>
            
                @if(count($peoples) > 0)
                    @foreach($peoples as $people)
                        <?php $c++; ?>
                     
            <tr class="post{{$people->id}}">
                        <td>{{ $c }}</td>
                        <td>{{ $people->name }}</td>
                        <td>{{ $people->email }}</td>
                        <td>{{ $people->phone }}</td>
                        <td> <a href="{{ url('user/'.$people->id) }}" class="btn btn-warning btn-xs"><i class="far fa-id-card"></i></a></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="#" class="edit-modal btn btn-primary btn-xs" data-id="{{$people->id}}" data-toggle="modal" data-target="#editModal{{$people->id}}"><i class="fas fa-edit"></i></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" class="show-modal btn btn-danger btn-xs" data-id="{{$people->id}}" data-toggle="modal" data-target="#deleteModal{{$people->id}}"><i class="fas fa-trash"></i></a></p></td>
            </tr>
        
        {{-- ------------------------------------------------------------Edit Users-------------------------------------------------------------------- --}}
            <div class="modal fade" id="editModal{{$people->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <div class="row justify-content-center">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-pencil-alt"></span></i></button>
                          <h4 class="modal-title custom_align" id="Heading">Edit The User</h4>
                          </div>
                      </div>
                      <div class="modal-body">
                          <form class="form-horizontal" role="modal" method="post" action="{{ url('admin/actions/'.$people->id) }}">
                          {{ csrf_field() }}
                           {{ method_field('PUT') }}
                          <div class="form-group row add justify-content-center">
              
                          <input class="form-control" type="text" id="name" name="name" placeholder="Name"  style="width: 80%;">
                          {{-- <!-- <p class="error text-center alert alert-danger hidden"></p>  -->--}}
                      </div>
                      <div class="form-group row justify-content-center">
                          <input class="form-control" type="email" id="email" name="email" placeholder="Email" style="width: 80%;">
                          {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
                      </div>
                      <div class="form-group row justify-content-center">
                          <input class="form-control" type="number" id="phone" name="phone" placeholder="Phone"  style="width: 80%;">   
                          {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
                      </div>
                      <div class="form-group row justify-content-center">
                            <input class="form-control" type="text" id="address" name="address" placeholder="Address"  style="width: 80%;">   
                            {{--<!-- <p class="error text-center alert alert-danger hidden"></p> -->--}}
                      </div>
                      </div>   
                          <div class="modal-footer">
                              <button type="submit" id="update" class="btn btn-warning btn-lg" style="width: 40%;"><i class="fas fa-check"></i> Update</button>
                          </div>
                      </form>
                      
                  <!-- modal-content --> 
                </div>
                    <!-- modal-dialog --> 
                  </div>
              </div>
        {{-- ------------------------------------------------------Delete Users--------------------------------------- --}}
        <div class="modal fade" id="deleteModal{{$people->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <form action="{{ url('admin/actions/'.$people->id) }}" method="post" id="form1"> 
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    {{--<!-- url('dashboard/delete/'.$people->id) -->--}}
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"><i class="fas fa-trash"></i></span></button>
                               <h4 class="modal-title custom_align" id="Heading">Delete this Stock</h4>
                           </div>
                           <div class="modal-body">       
                               <div class="alert alert-danger"><i class="fas fa-exclamation fa-2x"></i> Are you sure you want to delete this User?</div>       
                               <span class="hidden id"></span>
                         
                           </div>
                           <div class="modal-footer ">
                               <input type="submit" class="btn btn-danger" value="YES"> 
                               <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-eraser"></i> No</button>
                           
                             
                           </div>
                       </div>
                    
                   </div>
                   </form>
               </div>
               @endforeach
               @endif
        </tbody>
    </table>
            </div>
        </div>
    </div>

@endsection