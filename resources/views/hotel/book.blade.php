@extends('base')

@section('content')
<h1>You are booking {{$room->name}} Room</h1>
<form action="{{ route('confirm.book', $room) }}" method='post'>
@csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ auth()->user()->name}}">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Number</label>
        <input type="text" class="form-control" name="number" id="exampleFormControlTextarea1" ></input>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Check In</label>
        <input type="date" class="form-control" name="check_in" id="exampleFormControlInput1" value="{{$check_in}}">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Check Out</label>
        <input type="date" class="form-control" name="check_out" id="exampleFormControlTextarea1" value="{{$check_out}}"></input>
    </div>

    <button type="submit" class="btn btn-outline-primary">Confirm</button>
</form>
@endsection