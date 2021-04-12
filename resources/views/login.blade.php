@extends('base')

@section('content')

<form action="{{ route('login') }}" method="post">
@csrf

  <!-- <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="enail" name="email" placeholder="name@example.com">
    </div>
  </div> -->

<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control @error('password') border border-danger border-2 @enderror" id="email" name="email" placeholder="name@example.com">
    @error('password')
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

  <button type="submit" class="btn btn-info">Register</button>

  </form>

@endsection