@extends('layouts.app')

@section('content')


<div class="container">
<div class="row">
<div class="col-md-auto">
<div class="jumbotron"><h2>Welcome Admin</h2></div>
<form>
  <div class="form-group">
    <label for="exampleInputNumber1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
  <div class="form-group">
    <label for="exampleInputNumber1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>