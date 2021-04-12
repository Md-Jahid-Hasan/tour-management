@extends('base')

@section('content')

<form action="{{ route('hotel') }}" method="post">
@csrf
  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Hotel Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('name') border border-danger border-2 @enderror"
        id="name" name="name" placeholder="Your Name" value="{{old('name')}}">
        @error('name')
        {{$message}}
        @enderror
    </div>
  </div>

  <div class="mb-3 row">
  <label for="place_id" class="col-sm-2 col-form-label">Select place</label>
  <div class="col-sm-10">
    <select class="form-select  @error('name') border border-danger border-2 @enderror" id="place_id" name="place_id" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($place as $place)
        <option value="{{ $place->id }}">{{ $place->divison}}, {{$place->tourist_spot}}</option>
        @endforeach
    
    </select>
  </div>
  </div>
  

    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control  @error('description') border border-danger border-2 @enderror"
             id="description" name="description" rows="10"></textarea>
            @error('description')
            {{$message}}
            @enderror
        </div>

    </div>



  <button type="submit" class="btn btn-info">Register</button>

  </form>

@endsection
