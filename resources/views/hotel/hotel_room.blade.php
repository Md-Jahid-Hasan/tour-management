@extends('base')

@section('content')

<form action=" {{ route('hotel.search') }}" method='post'>
    @csrf
    <x-search_hotel/>
</form>

<form action="{{ route('hotel.room', $room->first()->hotel_id) }}" method="post">
    @csrf
    <div class="input-group m-3">
    <select class="form-select" aria-label=".form-select-lg example" name="name">
    <option value="0" selected>Open this select menu</option>
    @foreach($tags as $tag)
    <option value="{{ $tag->id}}">{{ $tag->name}}</option>
    @endforeach
    </select>
    <button type="submit" class="btn btn-outline-primary m-1">Search</button>
    </div>
</form>

@if($room->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($room as $room)
            <x-room_list :room=$room/>
        @endforeach
    </div>
@else
    <h1>No Hotel Available right now</h1>
@endif

@endsection