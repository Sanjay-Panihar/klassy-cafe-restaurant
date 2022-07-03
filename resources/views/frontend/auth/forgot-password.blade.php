@extends('layouts.auth')
@section('title' , 'Forgot-Password')
@section('content')
<div class="card-body px-5 py-5">
                
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                <form action ="{{ route('password.email') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label> Email *</label>
                    <input type="text" class="form-control p_input @error('title') is-invalid @enderror" name="email" value= "{{ old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn form-control">Email Password Reset Link</button>
                  </div>
                  <a href="{{route('login')}}" class="btn btn-primary form-control">Login</a>
                </form>
              </div>
@endsection