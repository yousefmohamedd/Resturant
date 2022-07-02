<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      if (auth()->user()->is_admin == 1){
        return redirect()->route('orders');
      }
      $orders = Order::latest()->where('user_id' , auth()->user()->id)->get();
      return view('home' , compact('orders'));
    }
}
