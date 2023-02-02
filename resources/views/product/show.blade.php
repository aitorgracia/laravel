@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    
    <br>Producto nº {{ $product ->id }}<br>
    <table class="table table-stripped table-hover">

    <tr>
        <td>{{ $product ->nombre }}</td>
        <td>{{ $product ->descripcion }}</td>
        <td>{{ $product ->precio }}</td>
        <td><a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary" >Editar</a></td>
        <td><a href="{{ route('products.show',$product->id) }}" class="btn btn-primary" >Ver</a></td>
    </tr>
    

    </table>

    </div>
    </div>
</div>
@endsection