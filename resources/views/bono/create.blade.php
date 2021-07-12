@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Bono</h1>
@stop

@section('content')
<form action="/bono" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Beneficiario</label>
        <select name="id_user" id="id_user" class="block mt-1 w-full form-control" tabindex="1">
            @foreach ( $user as $usuarios )
                <option value="{{$usuarios->id}}">{{$usuarios->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Bono</label>
        <input id="Tipo_bono" name="Tipo_bono" type="text" class="form-control"  required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="Descripcion" name="Descripcion" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Valor</label>
        <input id="Valor" name="Valor" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input id="Fecha" name="Fecha" type="date" class="form-control"required>
    </div>
    <a href="/bono" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
