@extends('layouts.app')

@section('content')
<div class="container">
      <h2 class="text-center">Create new team</h2><br/>

      @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
      @endif

    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

      <form method="post" action="{{ route('teams.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="username" >{{ __('Team name') }}</label>

                <input id="team_name" type="text" class="form-control{{ $errors->has('team_name') ? ' is-invalid' : '' }}" name="team_name" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('team_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('team_name') }}</strong>
                    </span>
                @endif
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="country">Country:</label> <br>
              <input type="text" class="form-control" name="country">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <label for="country">Country's flag</label>
          <br>
            <input type="file" name="flag">    
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px"><br>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success left">Submit</button>
        </div>
      </form>
      
  </div>
<a class="btn btn-primary offset-md-4" href ="{{ url('admin/teams') }}"> Return to team page </a>
</div>

@endsection


