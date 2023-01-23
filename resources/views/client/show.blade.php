@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br>Producto nº {{ $product ->id }}<br>
    <table class="table table-stripped table-hover">

    <tr>
            <td>{{ $client ->dni }}</td>
            <td>{{ $client ->nombre }}</td>
            <td>{{ $client ->apellidos }}</td>
            <td>{{ $client ->telefono }}</td>
            <td>{{ $client ->email }}</td>
        <td><a href="{{ route('clients.edit',$client->id) }}" class="btn btn-primary" >Editar</a></td>
        <td><a href="{{ route('clients.show',$client->id) }}" class="btn btn-primary" >Ver</a></td>
    </tr>
    

    </table>

    </div>
    </div>
</div>
@endsection