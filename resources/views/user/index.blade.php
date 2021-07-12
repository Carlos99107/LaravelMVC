@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<a href="user/create" class="btn btn-primary mb-3">Crear</a>

<table id="users" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            <form action="{{ route ('user.destroy',$user->id)}}" method="POST">
            <a href="/user/{{$user->id}}/edit" class="btn btn-info">Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link  href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#users').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
