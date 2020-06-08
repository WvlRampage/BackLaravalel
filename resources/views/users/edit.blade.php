@extends('template')

@section('section')
    <h1>Editar Usuario {{ $user->id }}</h1>

    @if (session('mensaje'))
        <div class='alert alert-success'>
            {{ session('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<form action="{{ route('users.update', $user->id) }}" method="POST" class='pb-5'>
    @method('PUT')
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

    <input 
        type="text" 
        name="name" 
        placeholder='Nombre' 
        class="form-control mb-2" 
        value="{{ $user->name }}">
    <input 
        type="email" 
        name="email"
        placeholder='Email' 
        class="form-control mb-2" 
        value="{{ $user->email }}">

    <button class='btn btn-warning btn-block' type='submit'>Editar Usuario</button>
    </form>
@endsection