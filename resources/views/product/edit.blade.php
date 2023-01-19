@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br><h1>Editar producto nº {{ $product ->id }}</h1><br>
    <table class="table table-stripped table-hover">

    <div>
        <a href="{{ route('products.index') }}" class="btn btn-primary" >Lista</a>
        <h3>Características del objeto a modificar:</h3>
        <p><b>Nombre: </b>{{ $product ->nombre }}</p>
        <p><b>Descripcion: </b>{{ $product ->descripcion }}</p>
        <p><b>Pecio: </b>{{ $product ->precio }}</p>
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

    <form action="{{ route('products.update',['product' => $product -> id])}}" method="post">
        <h3>Indica las modificaciones aqui: </h3>
        @csrf
        @method("PUT")
        Nombre: <input type="text" name="nombre" id="nombre" value="{{ $product->nombre ?? ''}}"><br>
        Descripcion: <input type="text" name="descripcion" id="descripcion" value="{{ $product->descripcion ?? ''}}"><br>
        Precio: <input type="text" name="precio" id="precio" value="{{ $product->precio ?? ''}}"><br>
        <input type="submit" class="btn btn-primary">
    </form>

    </div>
    </div>
</div>
@endsection