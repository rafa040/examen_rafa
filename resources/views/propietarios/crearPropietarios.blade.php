@extends('layout/plantilla')
@section('title','Crear propiedades y usuario')

@section('content')
    <h1 class="text-center">Crear propiedades y usuario</h1>

@if (session ('mensaje'))
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}  
    </div>
@endif

    <form action="{{route('propietarios.store')}}"  method="POST">
        @csrf
        @method('POST')
        @include('propietarios/form',['btn' => 'Guardar'])
    </form>
@endsection