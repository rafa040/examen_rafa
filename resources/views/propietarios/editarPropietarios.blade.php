@extends('layout/plantilla')

@section('title','Editar propietarios ususarios')

@section('content')
    <h1 class="text-center">Crear propietarios ususarios</h1>

    <form action="{{route('propietarios.update',$propietarios->id)}}" method="POST">
        @csrf
        @method('PUT')
        @include('propietarios/form',['btn' => 'Editar'])
    </form>
@endsection