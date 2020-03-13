@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <a class="text-dark" href="{{url('/')}}">
                <h1 class="my-4">Shop</h1>
            </a>
            <div class="list-group">
                @foreach($categories as $category)
                <a href="{{url('/categories/'.$category->id)}}" class="list-group-item">{{$category->nombre}}</a>
                @endforeach
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="/img/slide1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="/img/slide2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="/img/slide3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

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
                            <small class="text-muted">{{$product->category_nombre}}</small>
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

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Emanuel Yune - Juanjo Diaz</p>
    </div>
    <!-- /.container -->
</footer>
@endsection