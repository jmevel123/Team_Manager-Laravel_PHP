@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">ALL TEAMS THERE ARE</h1>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

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
        <a class="btn btn-primary" href ="{{ url('admin/teams/' . $team->id) }}"> View </a>
        <a class="btn btn-success" href ="{{ url('admin/teams/' . $team->id . '/edit') }}"> Update </a>
        <form style="display:inline-block;" type="hidden" action="{{ url('admin/teams/' . $team->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit" >Delete</button>
         </form>
    </td>
    </tr>
@endforeach
</table>
<a class="btn btn-primary" href ="{{ url('admin/teams/create') }}"> Create new team </a>
</div>
@endsection

