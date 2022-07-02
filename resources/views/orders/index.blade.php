@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-2">
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
        </div><!-- col-md-2 left -->


        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>Orders</h3>
                </div><!-- card-header -->

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                       <h3 class="text-center"> {{ session('message') }} </h3>
                    </div>
                @endif
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Phone/Email</th>
                                <th scope="col">Date/Time</th>
                                
                                <th scope="col">Meal</th>
                                <th scope="col">S.Meal</th>
                                <th scope="col">M.Meal</th>
                                <th scope="col">L.meal</th>
                                <th scope="col">Total($)</th>
                                <th scope="col">Body</th>
                                <th scope="col">Status</th>

                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Completed</th>

                            
                            
                        </thead>

                        @foreach ($orders as $order)
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->user->email}} <br> {{$order->phone}}</td>
                            <td>{{$order->date}} <br> {{$order->time}}</td>
                            <td>{{$order->meal->name}} </td>
                            <td>{{$order->small_meal}} </td>
                            <td>{{$order->medium_meal}} </td>
                            <td>{{$order->large_meal}} </td>

                            <td> ${{
                                ($order->meal->small_meal_price * $order->small_meal)+ 
                                ($order->meal->medium_meal_price * $order->medium_meal)+
                                ($order->meal->large_meal_price * $order->large_meal)
                                }} 
                            </td>

                            <td>{{$order->body}} </td>
                            <td>{{$order->status}} </td>

                            <form action="{{ route('orders.status', ['id'=>$order->id]) }}" method="post">
                                @csrf

                                <td><input type="submit" name="status" value="accepted" class="btn btn-primary btn-sm"></td>
                                <td><input type="submit" name="status" value="rejected" class="btn btn-danger btn-sm"></td>
                                <td><input type="submit" name="status" value="completed" class="btn btn-success btn-sm"></td>
                            </form>
                        </tr>
                        @endforeach

                    </table>


                </div><!-- card-body -->
            </div><!--  card -->
        </div> <!-- col-md-9 -->
    </div><!-- row -->
</div> <!--  container -->
@endsection
