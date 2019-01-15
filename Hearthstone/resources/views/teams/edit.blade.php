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

      <form method="post" action="{{ route('teams.update', $teams->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="team_name">Name of the team:</label> <br>
            <input type="text" class="form-control" name="team_name" value="{{$teams->team_name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="country">Country:</label> <br>
            <input type="text" class="form-control" name="country" value="{{$teams->country}}">
          </div>
        </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="country">Country's flag </label>
              <br>
              <input type="file" name="flag"> 
            </div>   
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
              <button type="submit" class="btn btn-success">Editing the team</button>
            </div>
          </div>
      </form>

      <a class="btn btn-primary offset-md-4" href ="{{ url('admin/teams') }}"> Return to team page </a>
</div>
@endsection


