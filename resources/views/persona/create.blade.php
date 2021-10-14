@extends('layouts.vistaprincipal')

@section('header')
    {{ __('Nuevo Usuario') }}
@endsection

@section('contenido')
    <form action="{{url('personas')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label text-secondary ">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" tabindex="1" required autocomplete=off>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label text-secondary ">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" tabindex="2" required autocomplete=off>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label text-secondary ">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" tabindex="3" required autocomplete=off>
        </div>
        <div class="mb-4">
            <label for="direccion" class="form-label text-secondary ">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" tabindex="4" required autocomplete=off>
        </div>
        <a href="../personas" tabindex="5" class="btn btn-secondary">Cancelar</a>
        <button type="submit" tabindex="6" class="btn btn-primary">Guardar</button>
    </form>
@endsection