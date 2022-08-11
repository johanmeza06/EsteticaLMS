<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // el index nos manda a la vista de lista de clientes
    public function index()
    {
        // se crea una array que contiene todos los datos
        $datos['clientes'] = Clientes::paginate(10);
        // se manda a la vista de lista de clientes con los datos
        return view('cliente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // el create sirve para mandarnos a la vista de crear un nuevo cliente
    public function create()
    {
        // se manda a la vista de crear un nuevo cliente
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // el metodo store sirve para hacer todos los procesos para alamacenar en la base de datos
    public function store(Request $request)
    {

        // validacion de campos
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
        ];
        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'string' => 'El campo :attribute debe ser un texto',
            'email' => 'El campo :attribute debe ser un email valido',
        ];
        $this->validate($request, $campos, $mensaje);

        //recolectar los datos en una variable excepto el token
        $datosCliente = request()->except('_token');
        // insertar en la base de datos
        Clientes::insert($datosCliente);
        // redireccionar a la vista de lista de clientes con un mensaje de exito
        return redirect('cliente')->with('mensaje', 'Cliente agregado con exito');
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //nos permite buscar el cliente por el id
        $cliente = Clientes::findOrFail($id);

        // nos permite ver la vistas de editar
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // validacion de campos
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
        ];

        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'string' => 'El campo :attribute debe ser un texto',
            'email' => 'El campo :attribute debe ser un email valido',
        ];


        $this->validate($request, $campos, $mensaje);


        //recepcionar todos los datos execpto el token y el metodo
        $datosCliente = request()->except(['_token', '_method']);
        //buscar registro por id y ejecuta la actualizacion
        Clientes::where('id', '=', $id)->update($datosCliente);
        // redireccionar a la vista de lista de clientes con un mensaje de exito
        return redirect('cliente')->with('mensaje', 'Cliente modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // metodo destroy para eliminar a traves del parametro enviado
        Clientes::destroy($id);
        // redireccionar a la vista de lista de clientes con un mensaje de exito
        return redirect('cliente')->with('mensaje', 'Cliente eliminado con exito');
    }
}
