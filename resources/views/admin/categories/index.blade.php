@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row mt-4">
    <a href="{{url('/admin/categories/create')}}" type="button" class="btn btn-success my-4">Nueva Categoria</a>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td>{{$category->nombre}}</td>
          <td>
            <form method="post" action="{{url('/admin/categories/'.$category->id.'/delete')}}">
              @csrf
              <div class="d-flex flex-row">
                <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" class="btn btn-success">
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
    {{$categories->links()}}

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection