@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link disable" href="{{url('/carrito')}}">Carrito de Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/order')}}">Pedidos realizados</a>
            </li>
        </ul>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Estado</th>
                    <th>Costo</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <th>{{$order->estado}}</th>
                    <th>{{$order->costo}}</th>
                    <th>{{$order->created_at}}</th>
                    <th>
                        <a href="{{url('/order/'.$order->id)}}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection