<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;

class MealController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meals = Meal::paginate(2);
        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        return view('meals.create');
    }

    public function store(MealRequest $request)
    {
        $path = $request->image->store('public/image');
        Meal::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'small_meal_price'=>$request->small_meal_price,
            'medium_meal_price'=>$request->medium_meal_price,
            'large_meal_price'=>$request->large_meal_price,
            'category'=>$request->category,
            'image'=>$path,
        ]);
        return redirect()->route('meals')->with('status', 'Meal Added Successfully');
    }

    public function show( $id)
    {
        //
    }

    public function edit( $id)
    {
        $meal = Meal::find($id);
        return view('meals.edit', compact('meal'));
    }

    public function update(Request $request,  $id)
    {
       $meal = Meal::find($id);
       if($request->has('images')){
        $path = $request->image->store('public/image');
       }else{
        $path = $meal->image;
       }
       $meal->name = $request->name;
       $meal->description = $request->description;
       $meal->small_meal_price = $request->small_meal_price;
       $meal->medium_meal_price = $request->medium_meal_price;
       $meal->large_meal_price = $request->large_meal_price;
       $meal->category = $request->category;
       $meal->image = $path;
       $meal->save();

       return redirect()->route('meals')->with('status', 'Meal Updated Successfully');

    }

    public function destroy( $id)
    {
         $meal = Meal::find($id);
         $meal->delete();
         return redirect()->route('meals')->with('status', 'Meal Delete Successfully');
    }
}
