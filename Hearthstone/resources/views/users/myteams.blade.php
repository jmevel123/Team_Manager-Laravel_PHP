@extends('layouts.app')

@section('content')
<div class="container">

<h1 class="text-center">My profile</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name of team</th>
      <th>Country</th>
      <th>Flag</th>
    </tr>
  </thead>
  
  @foreach($teams as $team)
     <tr>
        <td>{{$team->id}}</td>
        <td>{{$team->team_name}}</td>
        <td>{{$team->country}}</td>
        <td><img src="/Image/{{$team->flag}}"></td>
   

    <td>    
        <a class="btn btn-primary" href ="{{ url('teams/' . $team->id) }}"> View </a>
        <a class="btn btn-success" href ="{{ url('teams/' . $team->id . '/edit') }}"> Update </a>
        <form style="width: 48%;display:inline-block;" type="hidden" action="{{ url('teams/' . $team->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit" >Delete</button>
         </form>
    </td>
    </tr>
@endforeach
</table>
<a class="btn btn-primary" href ="{{ url('home') }}"> Return to home page </a>
</div>
@endsection