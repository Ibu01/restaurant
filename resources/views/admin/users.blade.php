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
       <div class="w-75 mt-5 ">
        @if (session()->has('success'))
            <div>
                <p class="text-danger">{{session('success')}}</p>
            </div>
        @endif
         <table class="table table-striped " style="background-color:#e2e0d7">
            <h2 class="text-center text-info mb-3">Users and Admin Table</h2>
            <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ( $users as $user )
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if ($user->usertype == "0")
                <td>
                <form method="POST" action="{{route('user.delete',['user'=>$user])}}">
                    @csrf 
                    @method("DELETE")
                    <div>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                </td>
                @else
                    <td>Not Allowed</td>
                @endif
            </tr>
            @endforeach
         </table>
       </div>
      </div>
    </div>
@include('admin.adminscript')
  </body>
</html>