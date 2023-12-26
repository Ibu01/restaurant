<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
<div class="container-scroller">
    @include('admin.navbar')
<div class="w-75 p-3 card ">
    <h2 class="text-center text-info my-3">All Reservation List</h2>
    @if (session()->has('message'))
        <p class="text-danger">{{session('message')}}</p>
    @endif
<table class="table table-success table-striped ">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Guest</th>
      <th scope="col" class="text-center">Confirm</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($reservations as $reserve )
    <tr>
      <td>{{$loop->index+1}}</td> 
      <td>{{$reserve->name}}</td>
      <td>{{$reserve->email}}</td>
      <td>{{$reserve->phone}}</td>
      <td>{{$reserve->guest}}</td>
      <td>
        <ul class="d-flex">
            <div class="me-1">
              <li class="btn btn-success">Yes</li>
              <li class="btn btn-warning">Pending</li>
            </div>
            <form method="post" action="{{route('reservation.delete',['reserve'=>$reserve])}}">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </ul>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>    
</div>    
</div>
@include('admin.adminscript')
  </body>
</html>