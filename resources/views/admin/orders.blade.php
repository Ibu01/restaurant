<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
<div class="container-scroller">
    @include('admin.navbar')
<div class="w-75 text-white">
    
<form action="{{route('food.search')}}" method="get">
    @csrf
<div class="input-group mb-3 mt-5">
  <input type="text" name="search" class="form-control text-white" style="padding: 24px" placeholder="Search here">
  <div>
    <button type="submit" class="btn btn-primary p-3">Seacrh</button>
  </div>
</div>    
</form>  

@if ($data->count() > 0)
    <div class="my-5 p-3 card">
  <h2 class="text-center mb-3 text-info">All orders list</h2>
  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Food Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Total Price</th>
      <th scope="col" class="text-center">Confirmation</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $data )
   <tr>
    <td>{{$loop->index+1}}</td>
    <td>{{$data->foodname}}</td>
    <td>{{$data->price}}</td>
    <td>{{$data->quantity}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->address}}</td>
    <td>{{$data->price * $data->quantity}}</td>
     <td>
        <ul class="d-flex">
            <div class="me-1">
              <li class="btn btn-success">Yes</li>
              <li class="btn btn-warning">Pending</li>
            </div>
            <div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </ul>
      </td>
   </tr>
  @endforeach
  </tbody>
</table>
</div>
@else
    <div class="text-center text-danger">No Products available with this name</div>
@endif


</div>
</div>
<body>

@include('admin.adminscript')
  </body>
</html>