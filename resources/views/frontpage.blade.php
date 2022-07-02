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

                    <form action="{{ route('frontpage') }}" method="get">
                        @csrf
                    
                    
                    <div class="list-group">
                        <a href="/" class="list-group-item list-group-item-action">Display All Categories</a>
                        
                        <input type="submit" name="category" value="Pizza" class="list-group-item list-group-item-action">
                        <input type="submit" name="category" value="Burger" class="list-group-item list-group-item-action">
                        <input type="submit" name="category" value="Shawarma" class="list-group-item list-group-item-action">
                      </div>

                    </form>

                </div><!-- card-body -->
            </div><!--  card -->
        </div><!-- col-md-4 left -->


        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>Meals ({{count($meals)}} meal)</h3>
                </div><!-- card-header -->

                <div class="card-body">
                    <div class="row">
                        @forelse ($meals as $meal)
                            <div class="col-md-4 my-1 text-center">
                                <div class="card p-3 border-danger">
                                    <img src="{{Storage::url($meal->image)}}" class="img-thumbnial" alt="">
                                    <h4> {{ $meal->name }} </h4>
                                    <p> {{ $meal->description }} </p>
                                    <a href="{{ route('meal.show', ['id'=>$meal->id]) }}" class="btn btn-lg btn-danger">Order Now</a>
                                </div><!-- card -->
                            </div><!-- col -->
                        @empty
                            <div class="alert alert-danger p-5">
                                <h1 class="text-danger text-center"> No Meals To Show </h1>
                            </div><!-- alert -->
                        
                        @endforelse
                    </div><!-- row -->

                  


                </div><!-- card-body -->
            </div><!--  card -->
        </div> <!-- col-md-8 -->
    </div><!-- row -->
</div> <!--  container -->
@endsection
