@extends('layout/plantilla')

@section('title','Editar Convocatoria')

@section('content')
    <h1 class="text-center">Editar Convocatoria</h1>

    <form action="{{route('convocatorias.update',$convocatorias->id)}}" method="POST">
        @csrf
        @method('PUT')
        @include('convocatorias/form',['btn' => 'Editar'])
    </form>
@endsection