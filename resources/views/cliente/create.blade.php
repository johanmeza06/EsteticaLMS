<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nuevo cliente</title>
    <link rel="stylesheet" href="{{ asset('css/reservaStyles.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <form action="{{ url('/cliente') }}" method="post">
            @csrf
            {{-- se le pasa un parametro de tipo modo para cambiar un parametro en la vista principal --}}
            @include('cliente.form',['modo'=>'Aregar','modo1'=>'agregar'])
            <a class="btn btn-primary btn-agregar" href="{{url('cliente') }}">Volver atras</a>
        </form>
        
    </div>
    @endsection
</body>

</html>