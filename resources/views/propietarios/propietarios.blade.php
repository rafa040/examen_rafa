@extends('layout/plantilla')

@section('title','Propietarios')

@section('content')
<h1 class="text-center">Listado de Propietarios</h1>

<a href="{{ route('propietarios.create') }}" class="btn btn-primary  mx-5 mb-4">Nuevo</a>

@if (session ('mensaje'))
<div class="alert alert-success  alert-dismissible fade show" role="alert">
  {{ session('mensaje') }}
  
</div>
@endif
    <div class="card">
        <div class="card-body">


    <table class="table  table-hover dt-responsive nowrap" id="propietarios">
        <thead>
            <tr class="text-white bg-dark">
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Propiedad</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>

        <tbody>
        @if($propietarios->count())
            @foreach($propietarios as $propietario)
            <tr>
                <td>{{ $propietario-> id }}</td>
                <td>{{ $propietario-> nombre }}</td>
                <td>{{ $propietario-> propiedad }}</td>
                
                <td>
                    
                    <a href="{{route('propietarios.edit',$propietario->id)}}" class="btn btn-dark btn-sm">Editar</a>
                    
                    <form action="{{route('propietarios.destroy',$propietario->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                    </form>
                    
                </td>
                
            </tr>
            @endforeach
        @else
        <tr>
                <td>No hay cuentas bancarias</td>
        </tr>
        @endif
        </tbody>
    </table> 
    </div>
</div>
@endsection

