@extends('layouts.app')

@section('content')
<div class="container">
      <h2>Update team</h2><br/>
      <form method="post" action=" {{ route('players.update', $player->id)}} ">
        @CSRF       
        <input name="_method" type="hidden" value="PUT">

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="username">Username of the player:</label> <br>
            <input type="text" class="form-control" name="username" value="{{$player->username}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="country">Team:</label> <br>
              <select class="form-control" name="team_id">
              @foreach($teams as $team)
              <option value="{{$team->id}}" @if($team->id==$player->team->id) selected @endif>{{$team->team_name}}</option>
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
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
        </form>
</div>
@endsection


