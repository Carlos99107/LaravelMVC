@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<form action="/user/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="password" name="password" type="password" class="form-control" value="{{$user->password}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="text" class="form-control" value="{{$user->email}}">
    </div>
    <a href="/user" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
