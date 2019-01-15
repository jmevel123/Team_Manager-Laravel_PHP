@extends('layouts.app')

@section('content')
<div class="container">

    <h1>MATCHS OF THE WEEK</h1>

<table class="table table-striped">
    <thead>
        <th>Team number 1</th>
        <th>Team number 2</th>
        <th>Score Team 1</th> 
        <th>Score Team 2</th>
        <th>Winner of the match</th>
        <th>Placement</th>
    </thead>
    
    <tr>
        <td><img src="/Image/{{$matchs->team1->flag}}">{{ $matchs->team1->team_name }}</td>
        <td><img src="/Image/{{$matchs->team2->flag}}">{{ $matchs->team2->team_name }}</td>
        <td>{{ $matchs->score_1}}</td>
        <td>{{ $matchs->score_2}}</td>
        <td><img src="/Image/{{$matchs->winner->flag}}">{{ $matchs->winner->team_name }}</td>
        <td>{{ $matchs->placement }}</td>
    </tr>


    </table>
    <a class="btn btn-primary" href ="{{ url('admin/matchs/create') }}"> Create new match </a>

    </div>
    @endsection