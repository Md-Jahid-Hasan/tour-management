@extends('base')

@section('head-element')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css')}}">

<script type="text/javascript" src="{{ asset('js/select2.min.js')}}"></script>

@endsection

@section('content')

<form action="{{ route('hotel.room.create') }}" method="post">
@csrf
  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Room Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('name') border border-danger border-2 @enderror"
        id="name" name="name" placeholder="Your Name" value="{{old('name')}}">
        @error('name')
        {{$message}}
        @enderror
    </div>
  </div>
<div class="row row-cols-1 row-cols-md-3">
  <div class="mb-3 row">
    <label for="total_room" class="col-sm-8 col-form-label test">Total Room of this Type</label>
    <div class="col-sm-4">
        <input type="number" class="form-control @error('total_room') border border-danger border-2 @enderror"
        id="total_room" name="total_room" placeholder="" value="{{old('name')}}">
        </div>
        @error('total_room')
        {{$message}}
        @enderror
    
  </div>

  <div class="mb-3 row">
    <label for="capacity" class="col-sm-8 col-form-label">Room Capacity</label>
    <div class="col-sm-4">
        <input type="number" class="form-control @error('capacity') border border-danger border-2 @enderror"
        id="capacity" name="capacity" placeholder="" value="{{old('name')}}">
        </div>
        @error('capacity')
        {{$message}}
        @enderror
    
  </div>

  </div>

   

  <div class="mb-3 row">
  <label for="type" class="col-sm-2 col-form-label">Select place</label>
  <div class="col-sm-10">
    <select class="form-select  @error('name') border border-danger border-2 @enderror" id="type" name="type" aria-label="Default select example">
        <option value="AC">AC Room</option>
       
        <option value="Non Ac">Non-AC Room</option>
        
    
    </select>
  </div>
  </div>
  <div class="mb-3 row">
      
      <label for="tag" class="col-sm-2 col-form-label">Add Tag for your Room</label>
      <div class="col-sm-10">
       <select class="form-control tag-option" name="tag[]" id="tag" multiple="multiple">
          @foreach($tag as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
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

@section('java-script')
<script type="text/javascript">
 
    $('.tag-option').select2();

  </script>
@endsection