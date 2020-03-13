@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/carrito')}}">Carrito de Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{url('/order')}}">Pedidos realizados</a>
            </li>
        </ul>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Subtotal</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->order->items as $item)
                <tr>
                    <th><img src="{{$item->product->Url}}" height="50"></th>
                    <td>{{$item->product->nombre}}</td>
                    <td>{{$item->product->precio}}</td>
                    <td>{{$item->unidades}}</td>
                    <td>{{$item->product->precio * $item->unidades }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{url('/products/'.$item->product->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form method="post" action="{{url('/item')}}">
                                {{ method_field('DELETE') }}
                                @csrf
                                <input type="hidden" name="item_id" value="{{$item->id}}">

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex align-content-center">
            <form method="post" action="{{url('/order')}}">
                @csrf
                <button type="submit" class="btn btn-success">Realizar pedido</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection