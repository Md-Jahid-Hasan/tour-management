@extends('base')

@section('content')
<x-search_hotel />

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