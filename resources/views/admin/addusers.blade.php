@extends('layouts.try')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h2>Register</h2>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form method="POST" action="{{url('admin/actions')}}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{__('Name') }}:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{__('Email') }}:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
             
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="password">{{__('Password') }}:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                            <label for="password_confirmation">Password Confirmation:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
   
        </div>
    </div>
</div>
            
@endsection