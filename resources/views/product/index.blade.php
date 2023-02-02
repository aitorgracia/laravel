@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br>Lista de productos:<br>

    @can('create',App\Models\Product::class)

        <a href="{{  route('products.create')  }} " class="btn btn-primary">Nuevo Producto</a>

    @endcan

    {{session("contador")}}

    @if(session('exit'))
        <div class="alert alert-success">
            {{session('exit')}}
        </div>
    @endif
    <table class="table table-striped table-hover">
    @foreach($productList as $product)

        

        <tr>
            <td>{{ $product ->nombre }}</td>
            <td>{{ $product ->descripcion }}</td>
            <td>{{ $product ->precio }}</td>
            <td><a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary" >Editar</a></td>
        <td><a href="{{ route('products.show',$product->id) }}" class="btn btn-primary" >Ver</a></td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="post">

                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-primary" >Borrar</button>

            </form> 
        </td>
        </tr>

    @endforeach
    

    </table>

    </div>
    </div>
</div>
@endsection