@extends('views.dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection


@section('contenido')
    <a href="/personas/create" class="btn btn-primary">Nuevo</a>

    <table id="personas" class="table table-dark table-striped mt-2 text-center table-bordered ">
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
                            <a href="/personas/{{ $persona->id }}/edit" class="btn btn-primary">Editar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
    @endsection

@endsection