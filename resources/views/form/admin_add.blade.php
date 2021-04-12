@extends('base')

@section('content')
 <h1>{{$name}}</h1>
 <a href="{{route($name)}}">Click</a>

<form action=" {{ route('place.add') }} " method="POST">
@csrf

@if($name == "place.add")
 <select class="form-select" aria-label="Default select example" id="division" name='division'>
  <option selected>Select Division</option>
  <option value="Dhaka">Dhaka</option>
  <option value="Chittagong">Chittagong</option>
  <option value="Rajshahi">Rajshahi</option>
  <option value="Khulna">Khulna</option>
  <option value="Barishal">Barishal</option>
  <option value="Sylhet">Sylhet</option>
  <option value="Rangpur">Rangpur</option>
</select>
@endif

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Tourist spot name">
</div>


<div class="mb-3">
  <label for="desscription" class="form-label">Description</label>
  <textarea class="form-control" id="description" name="description" rows="7"></textarea>
</div>
<button type="submit" class="btn btn-secondary">Save</button>
</form>

@endsection