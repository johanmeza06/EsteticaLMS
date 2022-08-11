<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // se crea una variable con todos los datos de la tabla reservas
        $reservaDatos = Reservas::all();
        // se crea una variable con todos los datos de la tabla clientes
        $clienteDatos = DB::table('clientes')->get();
        // se retorna a la vista de lista de reservas con los datos
        return view('reserva.index', compact('reservaDatos', 'clienteDatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // selecciona el nombre y el id de la base de datos
        $clientes = Clientes::select('id', 'nombre')->get();
        // se manda a la vista de crear un nuevo cliente 
        return view('reserva.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de campos
        $campos=[
            'fecha' => 'required|string|max:100',
            'hora' => 'required|string|max:100',
            'cliente_id' => 'required|integer',
            'descripcion' => 'required|string|max:255',
        ];
        $mensaje=[
            'required' => 'El campo :attribute es requerido',
            'string' => 'El campo :attribute debe ser un texto',
            'integer' => 'El campo :attribute debe ser un numero',
        ];
        $this->validate($request, $campos, $mensaje);

        // recepcion de datos del formulario
        $datosReserva = request()->except('_token');
        // almacenamiento de datos en la base de datos
        Reservas::insert($datosReserva);
        // redireccionamiento a la vista de lista de reservas
        return redirect('reserva')->with('mensaje', 'Cita agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // eliminacion de registro
        Reservas::destroy($id);
        // redireccionamiento a la vista de lista de reservas
        return redirect('reserva');
    }
}
