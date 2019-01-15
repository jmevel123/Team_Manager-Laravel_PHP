@extends('layouts.app')

@section('content')
<div class="container">

<h1 class="text-center">MY PROFILE</h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Creation Date</th>
        <th>Last update</th>

      </tr>
    </thead>

     <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->is_admin }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
</table>
<a class="btn btn-primary" href ="{{ url('home') }}"> Return to home page </a>
</div>
@endsection