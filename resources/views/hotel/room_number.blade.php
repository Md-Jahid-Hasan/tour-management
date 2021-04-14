@extends('base')

@section('navbar')
<li class="nav-item">
   <a class="nav-link" href="{{ route('hotel.room.create') }}" tabindex="-1">Create Room</a>
 </li>
@endsection


@section('content')

<form action="{{ route('hotel.booking') }}" method="post" class="m-3">
    @csrf
    <div class="input-group">
        <span class="input-group-text">Enter Room Number And Select Room</span>
        <input type="text" name="number" placeholder="Enter Room Number"
           class="form-control @error('number') border border-danger border-2 @enderror">
        <select class="form-select" name="room" id="room" placeholder="First name">
        @foreach($room as $each_room) 
            <option value="{{ $each_room->id }}">{{  $each_room->name }}</option> 
        @endforeach   
        </select>
        <button type="submit" class="btn btn-success m-2">Save Room</button>
    </div>

    
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Room Number</th>
      <th scope="col">Room Name</th>
      <th scope="col">Check In Time</th>
      <th scope="col">Check Out Time</th>
      <th scope="col">Book This Room</th>
      <th scope="col">Force Check Out</th>
      <th scope="col">Delete This Room</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $room as $room)
    @foreach( $room->room_number as $room_number)
    <tr>
      <th scope="row">{{ $room_number->number}}</th>
      <th scope="row">{{ $room->name}}</th>
      <td>{{ $room_number->check_in}}</td>
      <td>{{ $room_number->check_out}}</td>
      <td>
     
        <a href="{{route('customer.room', $room_number)}}" class="btn btn-info">Add Guest</a>
      </td>

      <td>
        <form action="#" method="post">
           <button type="submit" class="btn btn-warning">Remove Guest</button>
        </form>
      </td>

      <td>
        <form action="{{ route('room.delete', $room_number) }}" method="post">
          @csrf
          @method('DELETE')
           <button type="submit" class="btn btn-danger">Click</button>
        </form>
      </td>
    </tr>
    @endforeach
    @endforeach
  </tbody>
</table>
@endsection
