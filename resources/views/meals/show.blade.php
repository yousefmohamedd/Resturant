@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                        <h3>Menu</h3>
                </div><!-- card-header -->

                <div class="card-body">
                    @if (Auth::check())
                    <form action="{{ route('order.store')}}" method="post">
                        @csrf

                

                        <h4>name : {{auth()->user()->name}}</h4>
                        <h4>name : {{auth()->user()->email}}</h4>
                        <p>phone : <input type="number" name="phone" class="form-control"></p>
                        <p>Small size : <input type="number" name="small_meal" value="0" class="form-control"></p>
                        <p>Medium size : <input type="number" name="medium_meal" value="0" class="form-control"></p>
                        <p>Large size : <input type="number" name="large_meal" value="0" class="form-control"></p>

                        <p> <input type="hidden" name="meal_id" value="{{$meal->id}}"> </p>

                        <p>Date : <input type="date" name="date" class="form-control"></p>
                        <p>Time : <input type="time" name="time" class="form-control"></p>

                        <p>
                        message :    <textarea name="body" class="form-control"  rows="4"></textarea>
                        </p>

                        <div class="d-grid">
                            <button type="submit" class= "btn btn-danger btn-lg">Make Order</button>
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                               <h3 class="text-center"> {{ session('message') }} </h3>
                            </div>
                        @endif
                        </div>
                    </form>
                        
                    @else
                        <p class="text-center"><a href="/login">Pleaase Login To Make Order</a></p>
                    @endif



                </div><!-- card-body -->
            </div><!--  card -->
        </div><!-- col-md-4 left -->


        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>Meals Details</h3>
                </div><!-- card-header -->

                <div class="card-body text-center">

                                    <img src="{{Storage::url($meal->image)}}" class="img-thumbnial w-50 "  alt="">
                                    <h4> {{ $meal->name }} </h4>
                                    <p class="text-left"> {{ $meal->description }} </p>
                                    <p class="badge bg-success"> {{ $meal->category }} </p>
                                    <br>

                                    <p>small meal price  {{$meal->small_meal_price}}</p>
                                    <p> medium meal price {{$meal->medium_meal_price}}</p>
                                    <p> large meal price {{$meal->large_meal_price}}</p>

                                    <a href="{{ route('meal.show', ['id'=>$meal->id]) }}" class="btn btn-lg btn-danger">Order Now</a>
                                </div><!-- card -->



                </div><!-- card-body -->
            </div><!--  card -->
        </div> <!-- col-md-8 -->
    </div><!-- row -->
</div> <!--  container -->
@endsection
