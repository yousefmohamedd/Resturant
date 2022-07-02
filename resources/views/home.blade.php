@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your Order History</div>

                <div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">User</th>
            <th scope="col">Phone/Email</th>
            <th scope="col">Date/Time</th>

            <th scope="col">Meal</th>
            <th scope="col">S.Meal</th>
            <th scope="col">M.Meal</th>
            <th scope="col">L.Meal</th>
            <th scope="col">Total($)</th>
            <th scope="col">Message</th>
            <th scope="col">Status</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->user->email }} <br> {{ $order->phone }}</td>
            <td>{{ $order->date }} <br> {{ $order->time }}</td>
            <td>{{ $order->meal->name }}</td>
            <td>{{ $order->small_meal }}</td>
            <td>{{ $order->medium_meal }}</td>
            <td>{{ $order->large_meal }}</td>

            <td>
                $ {{
                    ($order->meal->small_meal_price * $order->small_meal)+
                    ($order->meal->medium_meal_price * $order->medium_meal)+
                    ($order->meal->large_meal_price * $order->large_meal)
                     }}
            </td>

            <td>{{ $order->body }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection