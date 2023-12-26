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
<div class="w-75">
<form action="{{route('chefs.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <h2 class="text-center text-secondary mt-3">Create a Chef Profile</h2>
    @if (session()->has('message'))
        <p class="text-success">{{session('message')}}</p>
    @endif
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control text-white" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Speciality</label>
    <input type="text" name="speciality" class="form-control text-white" placeholder="Enter speciality">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control text-white">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary w-25">Submit</button>
  </div>
</form>

<div class="my-5 p-3 card">
   @if (session()->has('success'))
      <p class="text-danger">{{session('success')}}</p>
    @endif
  <h2 class="text-center mb-3 text-info">Table Content</h2>
  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Chef Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Image</th>
      <th scope="col" class="text-center" style="width: 10px">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($chefdata as $data )
     <tr>
    <td>{{$loop->index+1}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->speciality}}</td>
    <td>
      <img src="/storage/{{$data->image}}" style="width: 50px;height:50px" alt="">
    </td>
    <td>
      <ul class="d-flex gap-1">
        <div>
          <li class="btn btn-warning btn-sm"><a style="text-decoration: none" href="{{route('chefs.edit',['data'=>$data])}} ">Update</a></li>
        </div>
        <form action="{{route('chefs.delete',['data'=>$data])}}" method="POST">
          @csrf 
          @method('DELETE')
          <input type="submit" class="btn btn-danger btn-sm" value="Delete">
        </form>
      </ul>
    </td>
   </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>     
</div>
   @include('admin.adminscript')
  </body>
</html>