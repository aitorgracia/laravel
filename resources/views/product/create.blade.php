@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br><h1>Crea un producto</h1><br>
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

    <form action="{{ route('products.store') }}" method="post">
        <h3>Indica los campos aqui: </h3>
        @csrf
        @method("POST")
        Nombre: <input type="text" name="nombre" id="nombre"><br>
        Descripcion: <input type="text" name="descripcion" id="descripcion"><br>
        Precio: <input type="text" name="precio" id="precio"><br>
        <input type="submit" class="btn btn-primary">
    </form>

    </div>
    </div>
</div>
@endsection