<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nueva reserva</title>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/reservaStyles.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('content')

    <div class="container">

        @if(count($errors)>0)
    
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
    
        </div>
    
        @endif

        <form action="{{ route('reserva.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="cliente_id">seleccione el cliente</label>
                <select class="form-control" name="cliente_id" id="cliente_id">
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Ingrese fecha:</label>
                <input class="form-control" type="text" name="fecha" id="fecha" value="{{old('fecha')}}">
            </div>
            <div class="form-group">
                <label for="hora">Ingrese hora:</label>
                <input class="form-control" type="text" name="hora" id="hora" value="{{old('hora')}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Ingrese descripcion:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" maxlength="255"> {{old('descripcion')}}</textarea>
            </div>

            <br>
            
            <input class="btn btn-success btn-agregar" type="submit" value="Registrar Cita"> 
            <a class="btn btn-primary btn-agregar" href="{{url('reserva') }}">Volver atras</a>
        </form>
        
    </div>
    @endsection

</body>


</html>