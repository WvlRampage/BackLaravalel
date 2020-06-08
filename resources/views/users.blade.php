@extends('template')

@section('section')

<h1 class='pt-4'>Users</h1>

@if (session('mensaje'))
  <div class='alert alert-success'>
      {{ session('mensaje') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

<form action="{{ route('users.create') }}" method="POST" class='pb-5'>
  @csrf

  @error('name')
      <div class="alert alert-danger alert-dismissible fade show">
          El nombre es obligatorio  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @enderror

  @error('email')
      <div class="alert alert-danger">
          El correo es obligatorio  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @enderror

  @error('password')
      <div class="alert alert-danger">
          La clave es obligatoria  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @enderror

  <input type="text" name="name" placeholder='Nombre' class="form-control mb-2" value="{{ old('name') }}">
  <input type="email" name="email" placeholder='Email' class="form-control mb-2" value="{{ old('email') }}">
  <input type="password" name="password" placeholder='Password' class="form-control mb-2">
  <button class='btn btn-primary btn-block' type='submit'>Agregar Usuario</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>
        <a href="{{ route('users.detail', $user) }}">
          {{$user->name}}
        </a>
      </td>
      <td>{{$user->email}}</td>
      <td>
        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">
            Editar
        </a>

        <form action="{{ route('users.delete', $user) }}" class="d-inline" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
      </td>
    </tr>    
    @endforeach
  </tbody>
</table>

@endsection