<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/reservaStyles.css') }}">
</head>

<body class="body-background">
    @extends('layouts.app')




    @section('content')
    <div class="container">

        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show align-items-center" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

          
        <a class="btn btn-primary mb-3 btn-agregar" href="{{ url('cliente/create')}}">
            Agregar Cliente
        </a>

        <div class="table-responsive ">
            <table class="table table-light table-hover table-bordered">
                <thead class="thead-light">
                    <tr >
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $clientes as $cliente )
                    <tr>
                        <div class=" align-items-center">

                        </div>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre}}</td>
                        <td>{{ $cliente->apellido}}</td>
                        <td>{{ $cliente->email}}</td>
                        <td>{{ $cliente->telefono}}</td>
                    </div>
                        <td>
                            <div class="d-flex flex-wrap align-items-center">
                                <form action="{{ url('/cliente/'.$cliente->id.'/edit')}}" class="m-1">
                                    <input class="btn btn-warning btn-editar" type="submit" value="Editar">
                                </form>
                                <form action="{{url('/cliente/'.$cliente->id) }}" method="post" class="d-inline m-1">
                                    @csrf
                                    {{-- convertir en metodo DELETE --}}
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger btn-eliminar" type="submit"
                                        onClick="return confirm('¿Quieres Borrar?')" value="Eliminar">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $clientes->links() !!}
        </div>
</body>
</div>
@endsection

</html>