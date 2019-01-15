@extends('layouts.app')

@section('content')
<div class="container">
      <h2 class="text-center">Edit team</h2><br/>

      @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
      @endif

      <form method="post" action="{{ route('users.update', $users->id)}}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="username">Username:</label> <br>
            <input type="text" class="form-control" name="username" value="{{$users->username}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email:</label> <br>
              <input type="text" class="form-control" name="email" value="{{$users->email}}">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="password">Password:</label> <br>
              <input type="password" class="form-control" name="password" value="">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="password_confirmation">Password Confirmation:</label> <br>
              <input type="password" class="form-control" name="password_confirmation" value="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Editing the team</button>
          </div>
        </div>
      </form>
      <a class="btn btn-primary" href ="{{ url('admin/users') }}"> Return to team page </a>

</div>
@endsection


