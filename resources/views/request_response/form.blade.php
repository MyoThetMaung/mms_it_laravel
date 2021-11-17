<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="{{asset('dashboard/css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card my-5">
                    <div class="card-body">
                        <h2>Add New Item</h2>
                        <hr>
                        <form action="{{route('form.store')}}" method="POST">
                            @csrf

                            @if(session('status'))
                                <p class="alert alert-success">{!!session('status')!!}</p>          <!--data from model (database)-->                                                                   
                            @endif

                            <!-- all form validation error start -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <!-- form validation error start -->


                            <div class="form-group">
                                <label for="">Item</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Price(MMK)</label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                                        @error('price')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Stock(Piece)</label>
                                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock')}}">
                                        @error('stock')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Save item</button>
                        </form>
                    </div>
                </div>
            </div>

            @auth                                                                      <!--only login acc can see these-->
            <div class="col-12 col-md-6" >
                <div class="card my-5">
                    <div class="card-body">
                        {{Auth::user()}}

                        <br> <br>

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Item list</h2>
                        @if(session('delete'))
                                <p class="alert alert-success">{!!session('delete')!!}</p>          <!--data from model (database)-->                                                                   
                        @endif
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Control</th>
                                <th>Date and Time</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach(\App\Item::all() as $i)

                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->price}}</td>
                                    <td>{{$i->stock}}</td>
                                    <td><a href="{{route('form.delete',$i->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                                    <td>{{$i->created_at->diffForHumans()}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>