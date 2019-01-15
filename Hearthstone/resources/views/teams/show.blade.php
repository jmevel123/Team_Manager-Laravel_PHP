@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name of team</th>
        <th>Country</th>
        <th>Flag</th>
      </tr>
    </thead>

     <tr>
        <td>{{$teams->id}}</td>
        <td>{{$teams->team_name}}</td>
        <td>{{$teams->country}}</td>
        <td><img src="/Image/{{$teams->flag}}"></td>
    </tr>
</table>
<a class="btn btn-primary" href ="{{ url('admin/teams') }}"> Return to team page </a>
</div>
@endsection