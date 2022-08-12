{{-- isset() es un metodo que valida si una variable ah sido declarada--}}

{{-- Importaciones del proyecto --}}
<link rel="stylesheet" href="{{ asset('css/reservaStyles.css') }}">
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

{{-- Podemos mostrar el titulo respecto al formulario elegido --}}
    <h1 class="titulo-h1">{{ $modo }} Cliente</h1>
    {{-- esta seccion se encarga de la validacion de campos, es decir que no esten vacios --}}
    @if(count($errors)>0)
    <div class="alert alert-danger">
        {{-- Muestra los errores en una lista --}}
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- Seccion que muestra el formulario para crear un nuevo cliente y el editar cliente --}}
    @csrf
    {{-- los tienen una opracion ternaria el cual funciona como un if-else 
        Donde validarenmos en el formulario edit si la variable esta definida la envia al input.
        -la otra opcion es cuando pasa el else (:) donde si dejamos los campos vacios y presionamos el boton del formulario  se vuelven a recuperar
        los datos escritos. Cabe acotar que cada input tiene el mismo funcionamiento solo que con variables distintas--}}
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


