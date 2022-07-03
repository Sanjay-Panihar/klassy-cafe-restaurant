@extends('admin.layouts.adminhome')
@section('title', 'Edit Users')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 my-5">
  <div class="row">
    <div class="col-md-10">
    <h3>Edit User</h3>
    </div>
    <div class="col-md-2">
      <a href="/users" class="btn btn-success">Back</a>
    </div>
  </div>
  <div class="form-group">
    <form class="" action="{{ route('users.update', $user->id) }}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group my-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control @error('title', 'post') is-invalid @enderror" value="{{$user->name}}">
        @error('name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">
        @error('email')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" class="form-control" value="">
        @error('password')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="text" name="password_confirmation" class="form-control" value="">
        @error('password_confirmation')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <button type="submit"  class="btn btn-success">Update</button>
    </form>
  </div>
  </div>
  <div class="col-md-1"></div>
</div>


@endsection
