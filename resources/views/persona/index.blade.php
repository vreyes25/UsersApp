@extends('layouts.vistaprincipal')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    {{ __('Reporte') }}
    
@endsection


@section('new')
    <a href="/personas/create" class="btn btn-outline-primary align-items-end">Nuevo</a>
@endsection

@section('contenido')
    

    <table id="personas" class="table table-light table-striped mt-2 text-center table-bordered ">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr>
                    <td>{{$persona->id}}</td>
                    <td>{{$persona->nombre}}</td>
                    <td>{{$persona->apellido}}</td>
                    <td>{{$persona->correo}}</td>
                    <td>{{$persona->direccion}}</td>
                    <td>
                        <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/personas/{{ $persona->id }}/edit" class="btn btn-outline-primary">Editar</a>
                            <button type="submit" class="btn btn-outline-danger delete-button focus-off">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('#personas').DataTable({
                    "language": {
                        "sProcessing":    "Procesando...",
                        "sLengthMenu":    "Mostrar _MENU_ registros",
                        "sZeroRecords":   "No se encontraron resultados",
                        "sEmptyTable":    "Ningún dato disponible en esta tabla",
                        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de: _TOTAL_ registros",
                        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de: 0 registros",
                        "sInfoFiltered":  "(Filtrado de un total de: _MAX_ registros)",
                        "sInfoPostFix":   "",
                        "sSearch":        "Buscar:",
                        "sUrl":           "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":    "Último",
                            "sNext":    "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            });
        </script>

        <script>
            @if(session('update') == "done")
                Swal.fire(
                    '¡Listo!',
                    'El registro se actualizó correctamente',
                    'success'
                )
            @endif
        </script>

        <script>
            @if(session('store') == "done")
                Swal.fire(
                    '¡Listo!',
                    'El registro se guardó correctamente',
                    'success'
                )
            @endif
        </script>

        <script>
            @if(session('destroy') == "done")
                Swal.fire(
                    '¡Listo!',
                    'El registro se eliminó correctamente',
                    'success'
                )
            @endif
        </script>            
    @endsection

@endsection 