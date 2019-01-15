@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">ALL PLAYERS THERE ARE</h1>
<table class="table table-striped">
    <thead>
        <th>id</th>
        <th>Team name</th>
        <th>Country</th>
        <th>username</th>
        <th>created_at</th>
        <th>updated_at</th>
    </thead>
    
    @foreach ($players as $player)
    <tr>
        <td>{{ $player->id }}</td>
        <td>{{ $player->team->team_name }}</td>
        <td><img src="/Image/{{$player->flag}}"></td>
        <td>{{ $player->username }}</td>
        <td>{{ $player->created_at }}</td>
        <td>{{ $player->updated_at }}</td>
        <td>    
        <a class="btn btn-primary" href ="{{ url('admin/players/' . $player->id) }}"> View </a>
        <a class="btn btn-success" href ="{{ url('admin/players/' . $player->id . '/edit') }}"> Update </a>
        <form style="display:inline-block;" type="hidden" action="{{ url('admin/players/' . $player->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit" >Delete</button>
         </form>
    </td>        
    </tr>
@endforeach
    </table>
    <a class="btn btn-primary" href ="{{ url('admin/players/create') }}"> Create Player </a>

    </div>
    @endsection