@extends('layouts.app')

@section('content')
<div class="container">
      <h2 class="text-center">Create new match</h2><br/>
      <form method="post" action="{{ route('matchs.store') }}">
        @CSRF       
        <input type="hidden" name="_method" value="post">
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="team1_id">Team 1:</label> <br>
              <select class="form-control" name="team1_id" id="team1_id">
              @foreach($teams as $team)
              <option value="{{$team->id}}">{{$team->team_name}}</option>
              @endforeach
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="team2_id">Team 2:</label> <br>
              <select class="form-control" name="team2_id" id="team2_id">
              @foreach($teams as $team)
              <option value="{{$team->id}}">{{$team->team_name}}</option>
              @endforeach
              </select>
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="score_board">Score 1:</label> <br>
              <input type="text" class="form-control" name="score_1">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="score_board">Score 2:</label> <br>
              <input type="text" class="form-control" name="score_2">
            </div>
          </div>

            <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="team_name">Date of the match:</label> <br>
                <input type="date" class="form-control" name="date">
            </div>
            </div>

            <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="team2_id">Placement:</label> <br>
              <select class="form-control" name="placement">
              <option value="1/8 finale">1/16 finale</option>
              <option value="1/8 finale">1/8 finale</option>
              <option value="1/4 finale">1/4 finale</option>
              <option value="1/2 finale">1/2 finale</option>
              <option value="FINALE">FINALE</option>
              </select>
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="score_board">Winner:</label> <br>
              <select class="form-control" name="winner_id">
              <option id="option1" value=""></option>
              <option id="option2" value=""></option>
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

<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
	let $team1 = $('#team1_id');
	let $team2 = $('#team2_id');
	let $option1 = $('#option1');
	let $option2 = $('#option2');

	let text1 = $('#team1_id option:selected').text();
	$option1.text(text1);
	$option1.val($team1.val());

	let text2 = $('#team2_id option:selected').text();
	$option2.text(text2);
	$option2.val($team2.val());

	$team1.change(function() {
		let val = $team1.val();
		let text = $('#team1_id option:selected').text();
		$option1.val(val);
		$option1.text(text);
	});
	$team2.change(function() {
		let val = $team2.val();
		let text = $('#team2_id option:selected').text();
		$option2.val(val);
		$option2.text(text);
	});
})
    
    </script>
@endsection


