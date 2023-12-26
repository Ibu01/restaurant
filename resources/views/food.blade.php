    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">

                @foreach ($fooditems as $fooditem)
                    <form action="{{route('food.addtocart',['fooditem'=>$fooditem])}}" method="POST">
                        @csrf 
                       <div class="item">
                        <div class='card' style="background-image: url('/storage/{{$fooditem->image}}')">
                            <div class="price"><h6>${{$fooditem->price}}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$fooditem->title}}</h1>
                              <p class='description'>{{$fooditem->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            @if (Auth::id())
                                <input type="number" style="width: 40%;margin-right:27px" name="quantity" min="1" value="1">
                                <input type="submit" class="btn btn-success bg-success" value="Add to cart" />
                            @else
                                <input type="number" style="width: 40%;margin-right:19px" name="quantity " min="1" value="1">
                                <input type="submit" class="btn btn-success bg-success" value="Add to cart" />
                            @endif
                        </div>
                       </div>
                    </form>
                @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->