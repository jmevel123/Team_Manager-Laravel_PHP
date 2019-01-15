@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">MATCHS OF THE WEEK</h1>

<table class="table table-striped">
    <thead>
        <th>Team number 1</th>
        <th>Team number 2</th>
        <th>Score Team 1</th> 
        <th>Score Team 2</th>
        <th>Winner of the match</th>
        <th>Placement</th>
    </thead>
    
    @foreach ($matchs as $match)
    <tr>
        <td><img src="/Image/{{$match->flag1}}">{{ $match->team1->team_name }}</td>
        <td><img src="/Image/{{$match->flag2}}">{{ $match->team2->team_name }}</td>
        <td>{{ $match->score_1}}</td>
        <td>{{ $match->score_2}}</td>
        <td><img src="/Image/{{$match->winner->flag}}">{{$match->winner->team_name}}</td>
        <td>{{ $match->placement }}</td>
   

     <td>    
        <a class="btn btn-primary" href ="{{ url('admin/matchs/' . $match->id) }}"> View </a>
        <a class="btn btn-success" href ="{{ url('admin/matchs/' . $match->id . '/edit') }}"> Update </a>
        <form style="display:inline-block;" type="hidden" action="{{ url('admin/matchs/' . $match->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit" >Delete</button>
         </form>
         </td>
         </tr>
@endforeach
    </table>
    <a class="btn btn-primary" href ="{{ url('admin/matchs/create') }}"> Create new match </a>

    </div>
    @endsection