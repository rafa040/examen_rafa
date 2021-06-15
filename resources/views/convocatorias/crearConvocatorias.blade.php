@extends('layout/plantilla')
@section('title','Crear Convocatoria')

@section('content')
    <h1 class="text-center">Crear Convocatoria</h1>

@if (session ('mensaje'))
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}  
    </div>
@endif

    <form action="{{route('convocatorias.store')}}"  method="POST">
        @csrf
        @method('POST')
        @include('convocatorias/form',['btn' => 'Guardar'])
    </form>
@endsection