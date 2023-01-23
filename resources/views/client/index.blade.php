@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <br>Lista de clientes:<br>
    <a href="{{  route('clients.create')  }} " class="btn btn-primary">Nuevo Cliente</a>

    @if(session('exit'))
        <div class="alert alert-success">
            {{session('exit')}}
        </div>
    @endif
    <table class="table table-striped table-hover">
    @foreach($clientList as $client)

        

        <tr>
            <td>{{ $client ->dni }}</td>
            <td>{{ $client ->nombre }}</td>
            <td>{{ $client ->apellidos }}</td>
            <td>{{ $client ->telefono }}</td>
            <td>{{ $client ->email }}</td>
            <td><a href="{{ route('clients.edit',$client->id) }}" class="btn btn-primary" >Editar</a></td>
        <td><a href="{{ route('clients.show',$client->id) }}" class="btn btn-primary" >Ver</a></td>
        <td>
            <form action="{{ route('clients.destroy',$client->id) }}" method="post">

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