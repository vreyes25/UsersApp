@extends('layouts.vistaprincipal')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    {{ __('Reporte') }}
@endsection

@section('contenido')
    <a href="/personas/create" class="btn btn-outline-primary">Nuevo</a>

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

        <!-- <script>

            // $(".delete-button").submit(function(e) {
            //     e.preventDefault();
            // });

            $(".delete-button").on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "El registro se eliminará de forma permanente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                    // cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        // '¡Eliminado!',
                        // 'El registro se eliminó correctamente',
                        // 'success'
                        // )
                        alert(result.value);
                        this.submit();
                    } else {
                        alert("No hay nada aquí")
                    }
                })
            });
        </script> -->
    @endsection

@endsection
