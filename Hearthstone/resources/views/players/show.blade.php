@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
      <tr>
      <th>id</th>
        <th>team_id</th>
        <th>Country</th>
        <th>username</th>
        <th>created_at</th>
        <th>updated_at</th>
      </tr>
    </thead>

     <tr>
   
        <td>{{ $players->id }}</td>
        <td>{{ $players->team_id }}</td>
        <td><img src="/Image/{{$players->flag}}"></td>
        <td>{{ $players->username }}</td>
        <td>{{ $players->created_at }}</td>
        <td>{{ $players->updated_at }}</td>
        <td>    

    </tr>
</table>
<a class="btn btn-primary" href ="{{ url('admin/players') }}"> Return to team page </a>
</div>
@endsection