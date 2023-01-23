@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br><h1>Editar cliente nº {{ $client ->id }}</h1><br>
    <table class="table table-stripped table-hover">

    <div>
        <a href="{{ route('clients.index') }}" class="btn btn-primary" >Lista</a>
        <h3>Características del cliente a modificar:</h3>
        <p><b>Dni: </b>{{ $client ->dni }}</p>
        <p><b>Nombre: </b>{{ $client ->nombre }}</p>
        <p><b>Apellidos: </b>{{ $client ->apellidos }}</p>
        <p><b>Telefono: </b>{{ $client ->telefono }}</p>
        <p><b>Email: </b>{{ $client ->email }}</p>
    </div>
    
    @if($errors->any())
        <div class="alert alert-danger">
        <h6>Por favor corrige los siguientes errores:</h6>
        
            @foreach($errors->all() as $error)
            <li> {{$error}}<br></li>
            @endforeach
    
        </div>
    @endif

    </table>

    <form action="{{ route('clients.update',['client' => $client -> id])}}" method="post">
        <h3>Indica las modificaciones aqui: </h3>
        @csrf
        @method("PUT")
        Dni: <input type="text" name="dni" id="dni" value="{{ $client->dni ?? ''}}"><br>
        Nombre: <input type="text" name="nombre" id="nombre" value="{{ $client->nombre ?? ''}}"><br>
        Apellidos: <input type="text" name="apellidos" id="apellidos" value="{{ $client->apellidos ?? ''}}"><br>
        Telefono: <input type="text" name="telefono" id="telefono" value="{{ $client->telefono ?? ''}}"><br>
        Email: <input type="text" name="email" id="email" value="{{ $client->email ?? ''}}"><br>
        <input type="submit" class="btn btn-primary">
    </form>

    </div>
    </div>
</div>
@endsection