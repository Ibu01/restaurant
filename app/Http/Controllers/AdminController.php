<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Foodchef;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(Request $request) {
        $data = User::all();
        return view('admin.users',['users'=>$data]);
    }

    public function delete(User $user) {
        $user->delete();
        return redirect(route('user.list'))->with('success','User deleted..');
    }

    public function foodMenu() {
        $fooditems = Food::all();
        return view('admin.foodMenu',['fooditems'=>$fooditems]);
    }

    public function upload(Request $request) {
    $foodinfo = $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'required'
    ]);

    if ($request->hasFile('image')) {
        $foodinfo['image'] = $request->file('image')->store('food_images', 'public');
    }
    
    $newMenu = Food::create($foodinfo);
    return back();
    }

    public function deletefood(Food $fooditem) {
        $fooditem->delete();
        return redirect()->back()->with('message','product deleted..');
    }

    public function editfood(Food $fooditem) {
        return view('admin.edit',['fooditem'=>$fooditem]);
    }

    public function updatefood(Request $request,Food $fooditem)  {
        $data = $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'required'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('food_images', 'public');
    }
    $fooditem->update($data);
    return redirect(route('food.list'))->with('success','Updated success !! ' . $fooditem->title);
    }

//for reservation 
    public function reservation(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'guest'=>'required',
            'date'=>'required',
            'time'=>'required',
            'message'=>'required',
        ]);
        $newData = Reservation::create($data);
        return redirect()->back()->with('message','Your reservation is taken wait a bit for confirmation by admin');
    }

    public function reservationshow() {
        $reservations = Reservation::all();
        return view('admin.adminreservation', ['reservations'=>$reservations]);
    }
    
    public function reservationdelete(Reservation $reserve) {
        $reserve->delete();
        return redirect()->back()->with('message','Reservation deleted...');
    }
    //for chefs
    public function viewchefs() {
        $chefdata = Foodchef::all();
        return view('admin.adminchef',['chefdata'=>$chefdata]);
    }

    public function uploadchef(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'speciality'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('chef_images', 'public');
        }
        $newchef = Foodchef::create($data);
        return back()->with('message','Chef added effectively!!');
    }

    public function editchef(Foodchef $data) {
        return view('admin.editchef',['data'=>$data]);
    }

    public  function updatechef(Request $request ,Foodchef $data) {
        $info = $request->validate([
            'name'=>'required',
            'speciality'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $info['image'] = $request->file('image')->store('chef_images', 'public');
        }
        $data->update($info);
        return back()->with('message','Chef updated effectively!!');
    }

    public function deletechef(Foodchef $data) {
        $data->delete();
        return back()->with('success','Deleted items!!');
    }

    public function orders() {
        $data = Order::all();
        return view('admin.orders',['data'=>$data]);
    }

     public function search(Request $request) {
        $search = $request->search;
        $data = Order::where('name','like','%'.$search.'%')
        ->orWhere('foodname','like','%'.$search.'%')
        ->get();
        return view('admin.orders',['data'=>$data]);
    }

}
