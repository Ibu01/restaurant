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
<div class="container w-75">
    <h2 class="text-center text-warning my-3">Update Foods</h2>
    <form class="card p-3" method="POST" action="{{route('food.updatefood',['fooditem'=>$fooditem])}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" placeholder="Enter tilte" class="form-control text-white" value="{{$fooditem->title}}" >
    @error('title')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" name="price" placeholder="Enter Price" class="form-control text-white" value="{{$fooditem->price}}">
    @error('price')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <img src="/storage/{{$fooditem->image}}" style="width:80px;height:80px; border-radius:100%" alt="">
  </div>

  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control text-white">
    @error('image')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
 
  <div class=" mb-3">
    <label >Description</label>
    <input type="text" name="description"  class="form-control text-white" placeholder="Description" value="{{$fooditem->description}}">
    @error('description')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-info p-2 mb-3">Update</button>
</form>
</div>
</div>
@include('admin.adminscript')
  </body>
</html>



