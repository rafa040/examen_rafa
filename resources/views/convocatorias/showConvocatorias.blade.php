@extends('layout/plantilla')

@section('title','Editar Convocatoria')

@section('content')
    <h1 class="text-center">Editar Convocatoria</h1>
    <form action="{{route('convocatorias.show',$convocatorias->asunto)}}" method="POST">
        @csrf
        <button class="btn btn-primary mx-5 mb-4">{{__($btn)}}</button>
<a href="{{route('convocatorias.index')}}" class="btn btn-primary mb-4">Volver</a>


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <li> {{ $error}}</li>
        </div>
    @endforeach
@endif

<div class="row col-md-11 mx-4" >
    <div class="form-group  mx-4">
        <label for="fecha" class="form-label">@lang('fecha')</label>
        <input type="text" class="form-control"  required name="fecha" value="{{ date('Y-m-d')}}">
        <div class="alert-danger">
            @error('fecha')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>


    <div class="form-group  mx-4">
        <label for="hora1" class="form-label">@lang('hora1')</label>
        <input type="text" class="form-control"  required name="hora1" value="{{old('hora1',$convocatorias->hora1)}}">
        <div class="alert-danger">
            @error('hora1')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>

    <div class="form-group  mx-4">
        <label for="hora2" class="form-label">@lang('hora2')</label>
        <input type="text" class="form-control"  required name="hora2" value="{{old('hora2',$convocatorias->hora2)}}">
        <div class="alert-danger">
            @error('hora2')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>

    <div class="form-group  mx-4">
        <label for="asunto" class="form-label">@lang('asunto')</label>
        <input type="text" class="form-control"  required name="asunto" value="{{old('asunto',$convocatorias->asunto)}}">
        <div class="alert-danger">
            @error('asunto')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>

   



    <div class="form-group  mx-4">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" name="tipo" >
            <option value=""></option>
            <option value="extraordinaria"  @if ($convocatorias->tipo == 'extraordinaria')  selected  @endif name="extraordinaria" >extraordinaria</option>
            <option value="ordinaria"  @if ($convocatorias->tipo == 'ordinaria')  selected  @endif name="ordinaria">ordinaria</option>    
        </select>
        <div class="alert-danger">
            @error('tipo')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>



    <table class="table col-md-11 mx-5 ">
        <thead>
            <tr class="text-white bg-dark">
                <th></th>
                <th></th>
                <th scope="col">Nombre</th>
                <th colspan="col">propiedad</th>
                
    
            </tr>
        </thead>
    
        <tbody>
            
            @if ($propietarios -> count() )
             @foreach ($propietarios as $propietario)
            <tr>
                <td><input type="hidden"  name="id[]" value="{{$propietario->id}}"></td>
                <td><input class="form-check-input" type="checkbox" name='checkbox[]' value="{{$propietario->propiedad}}" id="checkbox"></td>
                <td><input type="text" class="form-control" name="nombre[]" value="{{$propietario->nombre}}" readonly> </td> 
                <td><input type="text" class="form-control" name="propiedad[]" value="{{$propietario -> propiedad}}" readonly></td> 
                
                
            </tr>
            @endforeach
            @else
                <tr>
                    <td>No hay Propietarios</td>
                </tr>
            @endif
            
        </tbody>
    </table>


    </form>
@endsection