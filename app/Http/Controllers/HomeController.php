<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $fooditems = Food::all();
        $chefdatas = Foodchef::all();
        return view('home',['fooditems'=>$fooditems,'chefdatas'=>$chefdatas]);
    }

    public function redirects()  {
        $fooditems = Food::all();
        $chefdatas = Foodchef::all();
        $usertype = Auth::user()->usertype;

        if( $usertype == "1") {
            return view('admin.adminhome');
        }else

        {   
            $userId = Auth::id();
            $count = Cart::where('user_id',$userId)->count();
            return view('home',['fooditems'=>$fooditems,'chefdatas'=>$chefdatas,'count'=>$count]);
        }
    }

    public function addtocart(Request $request,Food $fooditem)  {
        if(Auth::check())
        {
            $userId = Auth::id();
            $foodId = $fooditem->id;
            $foodName = $fooditem->title;
            $data = $request->validate([
                'quantity'=>'required'
            ]);
            Cart::create([
                'user_id'=>$userId,
                'food_id'=>$foodId,
                'food_name'=>$foodName,
                'quantity'=>$data['quantity']
            ]);
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showcart() {
        $userId = Auth::id();
        $count = Cart::where('user_id',$userId)->count();
        $data2 = Cart::select('*')->where('user_id', '=' , $userId)->get();
        $data = Cart::where('user_id',$userId)->join('food','carts.food_id', '=' ,'food.id')->get();
        return view('showcart',['count'=>$count,'data'=>$data,'data2'=>$data2]);
    }


    public function deletecart($itemId) {
        $userId = Auth::id();
        $cartItem = Cart::where('user_id', $userId)->where('id', $itemId)->first();
        if ($cartItem) {
           $cartItem->delete();
        }
        return redirect()->back();
    }

    // public function orderconfirm(Request $request) {

    //  foreach($request->foodname as $key => $foodname){
    //     $data = new Order;
    //     $data->foodname=$foodname; 
    //     $data->price = $request->price($key);
    //     $data->quantity = $request->quantity($key);
        
    //     $data->name = $request->data;
    //     $data->phone = $request->phone;
    //     $data->address = $request->address;

    //     $data->save();
    //     }
    //    return redirect()->back();
    // }

    public function orderconfirm(Request $request) {
    foreach ($request->foodname as $key => $foodname) {
        $data = new Order;
        $data->foodname = $foodname; 
        $data->price = $request->price[$key]; // Access the price as an array
        $data->quantity = $request->quantity[$key];
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();
    }
    return redirect()->back();
}


    
}
