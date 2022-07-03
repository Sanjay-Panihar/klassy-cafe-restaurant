@extends('layouts.auth')
@section('title' , 'Login')
@section('content')
<div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action ="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" class="form-control p_input @error('title') is-invalid @enderror" name="email" value= "{{ old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="{{ route('password.email') }}" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>

                  <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
                </form>
              </div>
@endsection
