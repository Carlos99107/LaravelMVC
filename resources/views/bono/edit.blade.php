@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Bono</h1>
@stop

@section('content')
<form action="/bono/{{$bono->id_bono}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Beneficiario</label>
        <select name="id_user" id="id_user" class="block mt-1 w-full form-control" >
            @foreach ( $user as $usuarios )
                @if ($usuarios->id == $bono->id_user)
                    <option selected value="{{$usuarios->id}}">{{$usuarios->name}}</option>
                @else
                    <option value="{{$usuarios->id}}">{{$usuarios->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Bono</label>
        <input id="Tipo_bono" name="Tipo_bono" type="text" class="form-control" value="{{$bono->Tipo_bono}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="Descripcion" name="Descripcion" type="text" class="form-control" value="{{$bono->Descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Valor</label>
        <input id="Valor" name="Valor" type="text" class="form-control" value="{{$bono->Valor}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input id="Fecha" name="Fecha" type="date" class="form-control" value="{{$bono->Fecha}}">
    </div>
    <a href="/orden" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
