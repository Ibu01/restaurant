<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>

<div class="container-scroller">
     @include('admin.navbar')
<div class="w-75">
<form action="{{route('chefs.update',['data'=>$data])}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    <h2 class="text-center text-secondary">Update a Chef Profile</h2>
    @if (session()->has('message'))
        <p class="text-success">{{session('message')}}</p>
    @endif
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control text-white" placeholder="Enter name" value="{{$data->name}}">
  </div>
  <div class="form-group">
    <label>Speciality</label>
    <input type="text" name="speciality" class="form-control text-white" placeholder="Enter speciality" value="{{$data->speciality}}">
  </div>
  <div>
    <img src="/storage/{{$data->image}}" style="width: 50px;height:50px;border-radius:100%" alt="">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control text-white">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary w-25">Update</button>
  </div>
</form>
</div>
</div>    
@include('admin.adminscript')
  </body>
</html>