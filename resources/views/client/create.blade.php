@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br><h1>Crea un cliente</h1><br>
    <table class="table table-stripped table-hover">
    
    @if($errors->any())
        <div class="alert alert-danger">
        <h6>Por favor corrige los siguientes errores:</h6>
        
            @foreach($errors->all() as $error)
            <li> {{$error}}<br></li>
            @endforeach
    
        </div>
    @endif

    </table>

    <form action="{{ route('clients.store') }}" method="post">
        <h3>Indica los campos aqui: </h3>
        @csrf
        @method("POST")
        Dni: <input type="text" name="dni" id="dni"><br>
        Nombre: <input type="text" name="nombre" id="nombre"><br>
        Apellidos: <input type="text" name="apellidos" id="apellidos"><br>
        Telefono: <input type="text" name="telefono" id="telefono"><br>
        Email: <input type="text" name="email" id="email"><br>
        <input type="submit" class="btn btn-primary">
    </form>

    </div>
    </div>
</div>
@endsection