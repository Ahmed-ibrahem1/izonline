@extends('layout.layout')
@section('content')

<div class="container">
    <div class="col-md-9 personal-info">
        <h3 class="mt-0">Personal info</h3>

<table class="table">
    
    <tbody>
      <tr>
        <th scope="col">First Name</th>
        <td>{{ $user->first_name }}</td>
      </tr>

      <tr>
        <th scope="col">Last Name</th>
        <td>{{ $user->last_name }}</td>
      </tr>
      <tr>
        <th scope="col">User Name</th>
        <td>{{  $user->username }}</td>
      </tr>
      <tr>
        <th scope="col">Email</th>
        <td>{{  $user->email }}</td>
      </tr>
      <tr>
        <th scope="col">Phone Number</th>
        <td>{{  $user->phone_number }}</td>
      </tr>
      <tr>
        <th scope="col">Sales</th>
        <td>{{  $user->sales() }}</td>
      </tr>


    </tbody>
  </table>
  <a href="{{ route('user.edit', $user) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Edit</a>
  <br> <br><br>
</div>
</div>
  

@endsection