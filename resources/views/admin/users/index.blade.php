@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row">
    {{-- <a href="{{url('/admin/users/create')}}" type="button" class="btn btn-success my-4">Nuevo Usuario</a> --}}
    <table class="table mt-5">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th >Email</th>
          <th>Rol</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->apellido}}</td>
          <td>{{$user->nombre}}</td>
          <td >{{$user->email}}</td>
          <td>{{$user->rol}}</td>
          <td>
            <a href="{{url('/admin/users/'.$user->id.'/orders')}}" class="btn btn-primary">
                <i class="fa fa-eye"></i>
              </a>
            {{-- <form method="post" action="{{url('/admin/users/'.$user->id.'/delete')}}">
              @csrf
              <div class="d-flex flex-row">
                
                <a href="{{url('/admin/users/'.$user->id.'/edit')}}" class="btn btn-success">
                  <i class="fa fa-edit"></i>
                </a>
                <button class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </form> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$users->links()}}

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection