<button class="btn btn-primary mx-5 mb-4">{{__($btn)}}</button>
<a href="{{route('propietarios.index')}}" class="btn btn-primary mb-4">Volver</a>


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <li> {{ $error}}</li>
        </div>
    @endforeach
@endif

<div class="row col-md-11 mx-4" >
    <div class="form-group  mx-4">
        <label for="nombre" class="form-label">@lang('nombre')</label>
        <input type="text" class="form-control"  required name="nombre" value="{{old('nombre',$propietarios->nombre)}}">
        <div class="alert-danger">
            @error('nombre')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>


    <div class="form-group  mx-4">
        <label for="nombre" class="form-label">@lang('propiedad')</label>
        <input type="text" class="form-control"  required name="propiedad" value="{{old('propiedad',$propietarios->propiedad)}}">
        <div class="alert-danger">
            @error('propiedad')
            <br>
            {{$message}}
            <br>
        @enderror
        </div>
    </div>

</div>