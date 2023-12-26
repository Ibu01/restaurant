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
    <h2 class="text-center mt-3 text-success">Create Product</h2>
<form class="card p-3" method="POST" action="{{route('food.upload')}}" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" placeholder="Enter tilte" class="form-control text-white" >
    @error('title')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" name="price" placeholder="Enter Price" class="form-control text-white">
    @error('price')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control text-white" >
    @error('image')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
 
  <div class=" mb-3">
    <label >Description</label>
    <input type="text" name="description"  class="form-control text-white" placeholder="Description">
    @error('description')
     <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>

<div class="my-5 p-3 card">
  <h2 class="text-center mb-3 text-info">Table Content</h2>

  @if (session()->has('message'))
    <div>
      <p class="text-danger">{{session('message')}}</p>
    </div>
  @endif

  @if (session()->has('success'))
    <div>
      <p class="text-primary">{{session('success')}}</p>
    </div>
  @endif


  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Food Name</th>
      <th scope="col">Purchage Amount</th>
      <th scope="col">Picture demo</th>
      <th scope="col">Description</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($fooditems as $fooditem )
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$fooditem->title}}</td>
      <td>{{$fooditem->price}}</td>
      <td>
        <img style="width: 50px;height:50px;border-radius:100%" src="/storage/{{$fooditem->image}}" alt="{{$fooditem->title}}">
      </td>
      <td>{{$fooditem->description}}</td>
      <td>
        <form method="POST" action="{{route('food.deletefood',['fooditem'=>$fooditem])}}">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
      <td>
         <a class="btn btn-success" href="{{route('food.editfood',['fooditem'=>$fooditem])}}">Edit</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>
</div>
<body>

@include('admin.adminscript')
  </body>
</html>