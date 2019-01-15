@extends('layouts.app')

@section('content')
<div class="container">
      <h2>Create new team</h2><br/>
      <form method="post" action="{{ route('players.store') }}">
        @CSRF       
        <input type="hidden" name="_method" value="post">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="team_name">Username of the player:</label> <br>
            <input type="text" class="form-control" name="username">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="country">Team:</label> <br>
              <select class="form-control" name="team_id">
              @foreach($teams as $team)
              <option value="{{$team->id}}">{{$team->team_name}}</option>
              @endforeach
              </select>

            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
         
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Create player</button>
          </div>
        </div>
        </form>
</div>
@endsection


