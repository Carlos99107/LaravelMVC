@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bono</h1>
@stop

@section('content')
<a href="bono/create" class="btn btn-primary mb-3">Crear</a>

<table id="ordenes" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Beneficiario</th>
        <th scope="col">Tipo de bono</th>
        <th scope="col">Descripción</th>
        <th scope="col">Valor</th>
        <th scope="col">Fecha</th>
    </tr>
</thead>
<tbody>
    @foreach ($bonos as $bono)
    <tr>
        <td>{{$bono->NameUser}}</td>
        <td>{{$bono->Tipo_bono}}</td>
        <td>{{$bono->Descripcion}}</td>
        <td>${{$bono->Valor}}</td>
        <td>{{$bono->Fecha}}</td>

        <td>
            <form action="{{ route ('bono.destroy',$bono->id_bono)}}" method="POST">
            <a href="/bono/{{$bono->id_bono}}/edit" class="btn btn-info">Editar</a>
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
    $('#bonos').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
