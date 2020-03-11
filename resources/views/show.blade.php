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

                <a href="{{url('/categories/'.$product->category->id)}}" class="list-group-item">{{$product->category->nombre}}</a>

            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="{{$product->Url}}" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{$product->nombre}}</h3>
                    <h4>${{$product->precio}}</h4>
                    <p class="card-text">{{$product->descripcion}}</p>
                    <span class="text-warning">{{$product->category->nombre}}</span>
                </div>
            </div>
            <!-- /.card -->

            <!-- Button trigger modal -->
            @if(auth()->user())
            <button type="button" class="btn btn-success my-4" data-toggle="modal" data-target="#exampleModalCentered">
                Añadir al carrito
            </button>
            @endif
            <!-- Modal -->
            <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenteredLabel">Seleccione la cantidad del producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{url('/item')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="modal-body">
                                <input type="number" name="unidades" id="unidades" value="1" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection