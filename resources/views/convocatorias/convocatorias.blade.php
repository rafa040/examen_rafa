@extends('layout/plantilla')

@section('title','Convocatorias')

@section('content')
<h1 class="text-center">Listado Convocatorias</h1>

<a href="{{ route('convocatorias.create') }}" class="btn btn-primary  mx-5 mb-4">Nuevo</a>

@if (session ('mensaje'))
<div class="alert alert-success  alert-dismissible fade show" role="alert">
  {{ session('mensaje') }}
  
</div>
@endif
    <div class="card">
        <div class="card-body">


    <table class="table  table-hover dt-responsive nowrap" id="convocatorias">
        <thead>
            <tr class="text-white bg-dark">
                <th scope="col">Id</th>
                <th scope="col">fecha</th>
                <th scope="col">hora1</th>
                <th scope="col">hora2</th>
                <th scope="col">asunto</th>
                <th scope="col">propiedad</th>
                <th scope="col">tipo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>

        <tbody>
        @if($convocatorias->count())
            @foreach($convocatorias as $convocatoria)
            <tr>
                <td>{{ $convocatoria-> id }}</td>
                <td>{{ $convocatoria-> fecha }}</td>
                <td>{{ $convocatoria-> hora1 }}</td>
                <td>{{ $convocatoria-> hora2 }}</td>
                <td>{{ $convocatoria-> asunto }}</td>
                <td>{{ $convocatoria-> propiedad }}</td>
                <td>{{ $convocatoria-> tipo }}</td>
                
                <td>
                   {{dd($convocatoria)}}
                    <a href="{{route('convocatorias.edit',$convocatoria->id)}}" class="btn btn-dark btn-sm">Editar</a>
                    
                    

                    <form action="{{route('convocatorias.destroy',$convocatoria->id)}}" method="post">
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

