@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                        <h3>Menu</h3>
                </div><!-- card-header -->

                <div class="card-body">

                    <div class="list-group">
                        <a href="{{ route('meals') }}" class="list-group-item list-group-item-action">Display All Meals</a>
                        <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">Create New Meal</a>
                        <a href="{{ route('orders') }}" class="list-group-item list-group-item-action"> Orders</a>
                      </div>

                </div><!-- card-body -->
            </div><!--  card -->
        </div><!-- col-md-3 left -->


        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>Add Meal</h3>
                </div><!-- card-header -->

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div  class="mb3">
                            <label>Name Of Meal</label>
                            <input type="text" name="name" class="form-control">
                        </div><!--  name -->

                        <div  class="mb3">
                            <label>Description Of Meal</label>
                                <textarea rows="4" name="description" class="form-control"></textarea>
                        </div><!--  Description -->

<div class="row row-cols-lg-auto  mb-3 g-3 align-items-center">
<label> Meals Prices($)</label>
<div class="col-12">
<input type="number" name="small_meal_price"  class="form-control" placeholder="small meal price">
</div>
<div class="col-12">
<input type="number" name="medium_meal_price"  class="form-control" placeholder="medium meal price">
</div>
<div class="col-12">
<input type="number" name="large_meal_price"  class="form-control" placeholder="large meal price">
</div>
</div><!-- price -->

<div class="mb3">
    <label>Category Of Meal</label>
        <select name="category" class="form-control form-select">
            <option value=""></option>
            <option value="Pizza">Pizza</option>
            <option value="Shawarma">Shawarma</option>
            <option value="Burger">Burger</option>
        </select>
</div><!--  Category -->

<div class="mb3">
    <label>Image Of Meal</label>
    <input type="file" name="image" class="form-control form-control-file">
</div><!--  Image -->

<div class="mb3 d-grid">
    <button type="submit" class="btn btn-lg btn-primary">Save</button>
</div><!--  Image -->


                    </form>
                </div><!-- card-body -->

            </div><!--  card -->
        </div> <!-- col-md-9 -->
    </div><!-- row -->
</div> <!--  container -->
@endsection
