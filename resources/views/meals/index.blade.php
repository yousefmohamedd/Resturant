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
                    <h3>Meals</h3>
                </div><!-- card-header -->

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                       <h3 class="text-center"> {{ session('message') }} </h3>
                    </div>
                @endif

<table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">S.price</th>
                <th scope="col">M.price</th>
                <th scope="col">L.price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            @if (count($meals) > 0 )
                @foreach ($meals as $key => $meal)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td><img src="{{ Storage::url($meal->image) }}" height="60" width="90" alt=""></td>
                        <td>{{ $meal->name }} </td>
                        <td>{{ $meal->category }} </td>
                        <td>{{ $meal->description }} </td>
                        <td>{{ $meal->small_meal_price }} </td>
                        <td>{{ $meal->medium_meal_price }} </td>
                        <td>{{ $meal->large_meal_price }} </td>
                        <td><a href="{{ route('meals.edit', ['id'=>$meal->id]) }}"> <i class="fa fa-edit"></i>  </a> </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$meal->id}}">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>

                    </tr>
                            <!-- Modal -->
<div class="modal fade" id="exampleModal{{$meal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route('meals.delete', ['id'=>$meal->id]) }}" method="post">
        @csrf
        @method('DELETE')

            
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delte Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h2 class="text-danger text-center">Are You Sure</h2>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>

        </form>

      </div><!-- modal-content -->
    </div>
  </div>
                @endforeach
            @else
            <div class="alert alert-danger" role="alert">
               <h1 class="text-danger">No Meals To Show</h1>
              </div>
            @endif
        </tbody>



</table>
{{ $meals->links() }}
                </div><!-- card-body -->
            </div><!--  card -->
        </div> <!-- col-md-9 -->
    </div><!-- row -->
</div> <!--  container -->
@endsection
