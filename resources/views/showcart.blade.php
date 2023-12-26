<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Restaurant</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                @if (session()->has('message'))
        <div class="p-1 bg-dark">
            <p class="text-success">{{session('message')}}</p>
        </div>
    @endif
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            <li>
                            <li class="scroll-to-section ">
                               @auth
                                <a href="" class="bg-warning pl-2 pr-2">
                                    Cart[{{$count}}]
                                </a>
                                @endauth
                              
                                @guest
                                 <a href="/" class="bg-warning pl-2 pr-2">Cart[0]</a>   
                                @endguest
                            </li> 
                            <li>   
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                       <li class="" style="margin-top:-10px">
                        <x-app-layout>
                        </x-app-layout> 
                       </li>
                    @else
                       <li> <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                        @if (Route::has('register'))
                          <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li> 
                        @endif
                    @endauth
                </div>
            @endif
                            </li>
                        </ul>        
                        {{-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> --}}
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>


<div id="top">
   <h1 class="text-info text-center my-4" style="font-size: 30px">Cart Data</h1> 
@php
    $overallGrossTotal = 0; // Initialize it here, outside of the loop
@endphp




<div>
    <form action="{{route('food.orderconfirm')}}" method="POST">
        @csrf
    <div class="card p-3" style="width: 90%">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $data)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <input type="text" class="text-primary" name="foodname[]" value="{{$data->title}}" hidden="">
                            {{$data->title}}
                        </td>
                        <td>
                            <input type="number" class="text-primary" name="price[]" value="{{$data->price}}" hidden="">
                            {{$data->price}}
                        </td>
                        <td>{{$data->description}}</td>
                        <td>
                            <input type="number" class="text-primary" name="quantity[]" value="{{$data->quantity}}" hidden="">
                            {{$data->quantity}}</td>
                        <td>
                            <?php
                            $grosstotal = $data->price * $data->quantity;
                            $overallGrossTotal += $grosstotal; 
                            echo $grosstotal;
                            ?>
                        </td>
                    </tr>
                @endforeach

                {{-- @foreach ($data2 as $data2)
                    <tr>
                     <td>
                    <form method="POST" action="{{ route('food.deletecart', ['data2' => $data2]) }}">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-danger">Delete {{$loop->index+1}}</button>
                    </form>
                  </td>
                 </tr>
                @endforeach --}}

    @foreach ($data2 as $data)
          <tr>
            <td>
               <a href="{{ route('food.deletecart', ['data2' => $data]) }}" class="btn btn-danger bg-danger" data-method="delete" data-confirm="Are you sure you want to delete this item?">Delete {{$loop->index+1}}</a>
           </td>
        </tr>
    @endforeach


            </tbody>
        </table>
        <div class="d-flex justify-center items-center ">
           <div>
              <h2 class="text-danger" style="font-size:30px;margin-right:10px">Overall Gross Total :</h2>
           </div>
           <div>
               <h2 class="text-success"style="font-size:30px">
                 <?php
                   echo $overallGrossTotal;
                 ?>
               </h2>
           </div>
        </div>

        <div class="text-center my-3">
            <button class="btn btn-warning " type="button" id="order">Order Now</button>
        </div>

<div class=" p-3" id="appear" style="display: none">
   
 <div class="w-75 mx-auto card p-3">

  <div class="form-group">
    <label >Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label >Phone</label>
    <input type="number" name="phone" class="form-control" placeholder="Enter number">
  </div>
  <div class="form-group">
    <label >Address</label>
    <input type="text" name="address" class="form-control" placeholder="Enter address">
  </div>
  
  <div class="d-flex">
        <input class="btn btn-success bg-success" type="submit" value="Order Confirm">
    <button id="close" type="button" class="btn btn-sucess text-white bg-danger w-25 ml-1">Close</button>
  </div>

 </div>
    
</div>
                
</div>
</form>
 
</div>



<!-- Display the overall gross total below the table -->


</div>    
    
    <script type="text/javascript">
    $(document).ready(function() {
        $("#order").click(function() {
            $("#appear").show();
        });

        $("#close").click(function() {
            $("#appear").hide();
        });
    });
</script>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>