@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row mt-5">

        <div class="col-lg-3">

            <a class="text-dark" href="{{url('/')}}">
                <h1 class="my-4">Shop</h1>
            </a>

            <div class="list-group">

                <a href="#" class="list-group-item">{{$query}}</a>

            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{url('/products/'.$product->id)}}"><img class="card-img-top" src="{{$product->Url}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{url('/products/'.$product->id)}}">{{$product->nombre}}</a>
                            </h4>
                            <h5>${{$product->precio}}</h5>
                            <p class="card-text">{{$product->descripcion}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$product->category?$product->category->nombre:''}}</small>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- /.row -->
            <div class="row">
                {{$products->links()}}
            </div>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection