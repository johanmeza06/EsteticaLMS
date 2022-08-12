<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    {{-- Muestra el nav, es decir muestra un layout de otra vista o otro archivo.php --}}
    @extends('layouts.app')
    {{-- muestra el contenido con la vista del nav --}}
    @section('content')
    <div class="container">
        {{-- se realiza la respectiva validacion si existe el mensaje --}}
        @if(Session::has('mensaje'))
        {{-- Se realiza un alert con la validacion de los campos vacios --}}
        <div class="alert alert-success alert-dismissible fade show align-items-center" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- Link que nos manda la vista create --}}
        <a class="btn btn-primary mb-3 btn-agregar" href="{{ url('reserva/create')}}">
            Agregar Cita
        </a>
        {{-- Tabla donde se muestra todos los datos en la base de datos --}}
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
                    {{-- Se realiza un ciclo Foreach donde vamos a iterar los valores de reserva --}}
                    @foreach( $reservaDatos as $reserva )
                    <tr>
                        <div class=" align-items-center">

                        </div>
                        <td>{{ $reserva->id}}</td>
                        <td>{{ $reserva->fecha}}</td>
                        <td>{{ $reserva->hora}}</td>
                        <td>{{ $reserva->descripcion}}</td>
                        <td>
                            {{-- Se realiza un ciclo Foreach donde vamos a iterar los valores de cliente --}}
                            @foreach($clienteDatos as $cliente)
                            {{-- Validacion donde verifica si el id del cliente es igual a la clave foranea --}}
                            @if($cliente->id == $reserva->cliente_id)
                            {{ $cliente->nombre}}
                            @endif
                            @endforeach
                        </td>
        </div>
        <td>
            <div class="d-flex flex-wrap align-items-center">
                {{-- Formulario para eliminar datos a traves de un boton --}}   
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
