@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br>Lista de productos:<br>
    <a href="{{  route('products.create')  }}">Nuevo Producto</a>
    <table class="table table-striped table-hover">

    @foreach($productList as $product)

        <tr>
            <td>{{ $product ->nombre }}</td>
            <td>{{ $product ->descripcion }}</td>
            <td>{{ $product ->precio }}</td>
            <td><a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary" >Editar</a></td>
        <td><a href="{{ route('products.show',$product->id) }}" class="btn btn-primary" >Ver</a></td>
        <td><a href="{{ route('products.destroy',$product->id) }}" class="btn btn-primary" >Borrar</a></td>
        </tr>

    @endforeach
    

    </table>

    </div>
    </div>
</div>
@endsection