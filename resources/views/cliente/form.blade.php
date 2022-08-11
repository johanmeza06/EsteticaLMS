{{-- isset() es un metodo que valida si una variable ah sido declarada--}}

<link rel="stylesheet" href="{{ asset('css/reservaStyles.css') }}">
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>


    <h1 class="titulo-h1">{{ $modo }} Cliente</h1>
    @if(count($errors)>0)
    
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif
    @csrf
        <div class="form-group">
            <label for="nombre">Ingrese Nombre:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="apellido">Ingrese Apellido:</label>
            <input class="form-control" type="text" name="apellido" id="apellido" value="{{isset($cliente->apellido)?$cliente->apellido:old('apellido')}}">
        </div>
        <div class="form-group">
            <label for="email">Ingrese email:</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ isset($cliente->email)?$cliente->email:old('email')}}">
        </div>
        <div class="form-group">
            <label for="telefono">Ingrese telefono:</label>
            <input class="form-control" type="text" name="telefono" id="telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:old('telefono')}}"><br>
        </div>
        <input class="btn btn-success btn-{{$modo1}}" type="submit" value="{{ $modo }} Cliente"> 


