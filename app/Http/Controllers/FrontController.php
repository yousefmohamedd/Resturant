<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Order;
class FrontController extends Controller
{

    public function index(Request  $request)
    {
      if(!$request->category){
        $meals = Meal::latest()->get();
        return view('frontpage' , compact('meals'));
      }
      $meals = Meal::where('category' , $request->category)->get();
      return view('frontpage' , compact('meals'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        Order::create([
            'phone'=>$request->phone,
            'time'=>$request->time,
            'date'=>$request->date,
           

            'user_id'=>auth()->user()->id,
            'meal_id'=>$request->meal_id,

            'small_meal'=>$request->small_meal,
            'medium_meal'=>$request->medium_meal,
            'large_meal'=>$request->large_meal,

            'body'=>$request->body,

        ]);
        return redirect()->back()->with('message', 'Your Order Is Added Successfully');

    }

  
    public function show($id)
    {
        $meal = Meal::find($id);
        return view('meals.show' , compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

  


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
