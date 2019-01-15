@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">ALL THE USERS THERE ARE:</h1><br/>

<table class="table table-striped">
    <thead>
        <th>username</th>
        <th>email</th>
        <th>is_admin</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th></th>
    </thead>
    
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->is_admin }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>    
        <a class="btn btn-primary" href ="{{ url('admin/users/' . $user->id) }}"> View </a>
        <a class="btn btn-success" href ="{{ url('admin/users/' . $user->id . '/edit') }}"> Update </a>
        <form style="display:inline-block;" type="hidden" action="{{ url('admin/users/' . $user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger" type="submit" >Delete</button>
         </form>
        </td>

    </tr>
@endforeach
    </table>
    <a class="btn btn-primary" href ="{{ url('admin/users/create') }}"> Create User </a>

    </div>
    @endsection
