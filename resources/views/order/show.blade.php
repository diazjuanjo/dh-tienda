@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-5">

    <div class="row">

        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link disabled" href="{{url('/carrito')}}">Carrito de Compras</a>
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
                <?php 
                    $subtotal = 0;
                    $total = 0;
                ?>
                @foreach($items as $item)
                <?php
                $subtotal = $item->product->precio * $item->unidades;
                // $total += $subtotal;
                ?>
                <tr>
                    <th><img src="{{$item->product->Url}}" height="50"></th>
                    <td>{{$item->product->nombre}}</td>
                    <td>{{$item->product->precio}}</td>
                    <td>{{$item->unidades}}</td>
                    <td>{{$subtotal}}</td>
                    <td>
                        <a href="{{url('/products/'.$item->product->id)}}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <?php
                // $subtotal = $item->product->precio * $item->unidades;
                $total += $subtotal;
                ?>
                @endforeach
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>{{$total}}</th>
                    <th></th>
                </tr>
            </tbody>
        </table>
        <div class="d-flex align-content-center">
            <form method="get" action="{{url('/order')}}">
                @csrf
                <button type="submit" class="btn btn-success">Volver</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection