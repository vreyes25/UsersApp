@extends('layouts.vistaprincipal')

@section('header')
    {{ __('Editar Usuario') }}
@endsection

@section('contenido')
    <form action="/personas/{{ $persona->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label text-secondary ">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" tabindex="1" required  value="{{ $persona->nombre }}">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label text-secondary ">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" tabindex="2" required value="{{ $persona->apellido }}">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label text-secondary ">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" tabindex="3" required value="{{ $persona->correo }}">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label text-secondary ">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" tabindex="4" required value="{{ $persona->direccion }}">
        </div>
        <a href="/personas" tabindex="5" class="btn btn-secondary">Cancelar</a>
        <button type="submit" tabindex="6" class="btn btn-primary">Actualizar</button>
    </form>
@endsection