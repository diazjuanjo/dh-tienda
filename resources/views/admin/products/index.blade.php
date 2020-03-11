@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row mt-4">
    <a href="{{url('/admin/products/create')}}" type="button" class="btn btn-success my-4">Nuevo Producto</a>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th class="collapse">Descripcion</th>
          <th >Categoria</th>
          <th>Precio</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td>{{$product->nombre}}</td>
          <td class="collapse">{{$product->descripcion}}</td>
          <td >{{$product->category?$product->category->nombre:''}}</td>
          <td>{{$product->precio}}</td>
          <td>
            <form method="post" action="{{url('/admin/products/'.$product->id.'/delete')}}">
              @csrf
              <div class="d-flex flex-row">
                <a href="{{url('/products/'.$product->id)}}" class="btn btn-primary" target="_blank">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('/admin/products/'.$product->id.'/edit')}}" class="btn btn-success">
                  <i class="fa fa-edit"></i>
                </a>
                <button class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$products->links()}}

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection