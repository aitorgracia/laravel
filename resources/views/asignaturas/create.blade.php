@extends('layouts.master')
@section('title','Alta asignaturas')

@section('encabezado')
Alta asignaturas
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
<br>
completa el siguiente formulario

<br>
<form action="{{route('asignaturas.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
    <br><br>
    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso"  value="{{old('curso')}}">
    <br><br>
    <label for="ciclo">Ciclo</label>
    <input type="text" name="ciclo" id="ciclo"  value="{{old('ciclo')}}">

    <br>

    <br>

    @stop
    @section('boton')
    @parent
    @section('destino')
    {{ route('asignaturas.store') }}
    @stop

    @section ('accionformulario')

    Enviar

    @stop
</form>
@stop