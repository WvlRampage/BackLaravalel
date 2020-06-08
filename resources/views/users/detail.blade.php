@extends('template')

@section('section')

<h1 class='pt-5'>Detalle de usuario:</h1>
<h4>id: {{ $user->id}}</h4>
<h4>Nombre: {{ $user->name}}</h4>
<h4 class='pb-5'>Email: {{ $user->email}}</h4>

@endsection