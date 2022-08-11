<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>

<body>
    @extends('layouts.app')




    @section('content')
    <div class="container">

        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
            </svg>

            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <a class="btn btn-primary mb-3 btn-agregar" href="{{ url('reserva/create')}}">
            Agregar Cita
        </a>

        <div class="table-responsive ">
            <table class="table table-light table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripcion</th>
                        <th>Nombre Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $reservaDatos as $reserva )
                    <tr>
                        <div class=" align-items-center">

                        </div>
                        <td>{{ $reserva->id}}</td>
                        <td>{{ $reserva->fecha}}</td>
                        <td>{{ $reserva->hora}}</td>
                        <td>{{ $reserva->descripcion}}</td>
                        <td>
                            @foreach($clienteDatos as $cliente)
                            @if($cliente->id == $reserva->cliente_id)
                            {{ $cliente->nombre}}
                            @endif
                            @endforeach
                        </td>

        </div>
        <td>
            <div class="d-flex flex-wrap align-items-center">
                <form action="{{url('/reserva/'.$reserva->id) }}" method="post" class="d-inline m-1">
                    @csrf
                    {{-- convertir en metodo DELETE --}}
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger btn-eliminar" type="submit" onClick="return confirm('¿Quieres Borrar?')" value="Eliminar">
                </form>
            </div>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</div>
@endsection

</html>
