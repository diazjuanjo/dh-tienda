@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">
        <table class="table mt-5">
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
        <a href="{{ url()->previous() }}" class="btn btn-success">Volver</a>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection