





@extends('base')

@section('content')

<form action="{{ route('register') }}" method="post">
@csrf
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
    <input type="text" class="form-control @error('name') border border-danger border-2 @enderror"
     id="name" name="name" placeholder="Your Name" value="{{old('name')}}">

     @error('name')
     {{$message}}
     @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
    <input type="text" class="form-control @error('username') border border-danger border-2 @enderror" value="{{old('username')}}"
         id="username" name="username" placeholder="Enter Username">
    @error('username')
     {{$message}}
     @enderror
    </div>
  
  </div>
  
  <!-- <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="enail" name="email" placeholder="name@example.com">
    </div>
  </div> -->

<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control @error('email') border border-danger border-2 @enderror" id="email" value="{{old('email')}}"
     name="email" placeholder="name@example.com">
    @error('email')
     {{$message}}
     @enderror
    </div>

  </div>
  <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control @error('password') border border-danger border-2 @enderror" id="password" name="password">
      @error('password')
     {{$message}}
     @enderror
    </div>

  </div>

  <div class="mb-3 row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
  </div>

  <button type="submit" class="btn btn-info">Register</button>

  </form>

@endsection