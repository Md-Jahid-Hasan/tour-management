@extends('base')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Check In</th>
      <th scope="col">Check Out</th>
      <th scope="col">Add</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customer as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->name}}</td>
      <td>{{$customer->phone_number}}</td>
      <td>{{$customer->check_in}}</td>
      <td>{{$customer->check_out}}</td>
      <form action="{{ route('customer.room.add') }}" method="post">
      @csrf
      <input class="form-control" type="hidden" name="customer" value="{{$customer->id}}">
        <input type="hidden" name="room_number_id" value="{{$room_number->id}}">
      
      
      <td>
           <button type="submit" class="btn btn-warning">Provide Room</button>
        </td>
        </form>

    </tr>

  @endforeach
 
  </tbody>
</table>

@endsection