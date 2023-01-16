@extends('layouts.master')
@section('title','Listado Productos')

@section('encabezado')
Listado Productos
@stop

@section('cuerpo')

@parent
@if($errors->any())

<div class="alert alert-danger">
    <h6>Por favor corrige los siguientes errores:</h6>
    
        @foreach($errors->all() as $error)
        <li> {{$error}}<br></li>
        @endforeach
  
</div>
@endif

<br>Lista de productos:<br>
    <a href="{{  route('products.create')  }}">Nuevo Producto</a>
    <table border="1">

    <tr>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Precio</td>
    </tr>

    @foreach($productList as $product)

        <tr>
            <td>{{ $product ->nombre }}</td>
            <td>{{ $product ->descripcion }}</td>
            <td>{{ $product ->precio }}</td>
            <td><a href="{{ route('products.edit',$product->id) }}">Editar</a></td>
            <td><a href="{{ route('products.show',$product->id) }}">Ver</a></td>
        </tr>

    @endforeach
    

    </table>

    <br>

    <br>
</form>
@stop