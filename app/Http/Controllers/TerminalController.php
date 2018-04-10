<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminal;
use App\Customer;


class TerminalController extends Controller
{
    

    //funcion que valida si el usuario está logeado
    public function __construct()
    {
        //Validación del Contructor: Verificar si el usuario está logeado
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //cargo en una variable todos los objetos(Registros)
         $terminals = Terminal::all();
         $customers = Customer::all();
        //cargo la vista, con todos los objetos (customers)
       return view('terminals.index')->with(compact('terminals'))->with(compact('customers'));
    }


    public function store(Request $request)
    {
          //Creamos las reglas de validación
        $rules = [
            'customer_id'=> 'required',
            'serial'=> 'required',
            'name'=> 'required',
            'lastAccess'=> 'required|string'
        ];

        $messages = [
            'customer_id.required' => 'El cliente es obligatorio',
            'serial.required' => 'La serie del equipo es obligatoria',
            'name.required' => 'el Nombre de la terminal es obligatoria',
            'lastAccess.required' => 'La fecha de último acceso es obligatoria',
            'lastAccess.string' => 'La Fecha es inválida'
        ];

       $this->validate($request, $rules, $messages);

        $terminal = new Terminal();
        $terminal->customer_id = $request->input('customer_id');
        $terminal->serial = $request->input('serial');
        $terminal->name = $request->input('name');
        $terminal->lastAccess = $request->input('lastAccess');
        $terminal->save();

        return back()->with ('notifications','La terminal ha sido agregada con éxito');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //cargo en una variable todos los objetos(Registros)
        $terminal = Terminal::find($id);
        $customers = Customer::all();

        //cargo la vista, con todos los objetos (customers)
       return view('terminals.edit')->with(compact('terminal'))->with(compact('customers'));
    }

   
    public function update(Request $request, $id)
    {
          //Creamos las reglas de validación
        $rules = [
            'customer_id'=> 'required',
            'serial'=> 'required',
            'name'=> 'required',
            'lastAccess'=> 'required|string'
        ];

        $messages = [
            'customer_id.required' => 'El cliente es obligatorio',
            'serial.required' => 'La serie del equipo es obligatoria',
            'name.required' => 'el Nombre de la terminal es obligatoria',
            'lastAccess.required' => 'La fecha de último acceso es obligatoria',
            'lastAccess.string' => 'La Fecha es inválida'
        ];

       $this->validate($request, $rules, $messages);

        $terminal = Terminal::find($id);       
        $terminal->customer_id = $request->input('customer_id');
        $terminal->serial = $request->input('serial');
        $terminal->name = $request->input('name');
        $terminal->lastAccess = $request->input('lastAccess');
        $terminal->save();

        return back()->with ('notifications','La terminal ha sido actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminal = Terminal::find($id);
        $terminal->delete();
        return back();
    }
}
