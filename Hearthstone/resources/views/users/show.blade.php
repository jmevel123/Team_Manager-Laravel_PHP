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
        <td>{{ $users->id }}</td>
        <td>{{ $users->username }}</td>
        <td>{{ $users->email }}</td>
        <td>{{ $users->is_admin }}</td>
        <td>{{ $users->created_at }}</td>
        <td>{{ $users->updated_at }}</td>
    </tr>
</table>
<a class="btn btn-primary" href ="{{ url('admin/users') }}"> Return to team page </a>
</div>
@endsection