<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminal;
use App\Customer;
use App\Licence;


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

    public function index($id)
    {

        $licence = Licence::find($id);
        $terminals = Terminal::where('licence_id', $id)->get();

        return view('terminals.index')->with(compact('licence'))->with(compact('terminals'));
    }

    public function store(Request $request)
    {
        //Creamos las reglas de validación
        $rules = [
            'licence_id'=> 'required',
            'name'=> 'required',
            'key'=> 'required',
            'lastAccess'=> 'required|date'
        ];

        $messages = [
            'licence_id.required' => 'La licencia es obligatoria',
            'name.required' => 'El nombre de la terminal es obligatorio',
            'key.required' => 'El keypara la terminal es obligatoria',
            'lastAccess.required' => 'La fecha de último acceso debe ser válida.',
            'lastAccess.date' => 'La Fecha es inválida'
        ];

       $this->validate($request, $rules, $messages);

        $terminal = new Terminal();
        $terminal->licence_id = $request->input('licence_id');
        $terminal->name = $request->input('name');
        $terminal->key = $request->input('key');
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
        $terminal = Terminal::find($id);

        // Busca y regresa el objeto licencia que corresponda a la Terminal
        $licence = Licence::find($terminal->licence_id);

       return view('terminals.edit')->with(compact('terminal'))->with(compact('licence'));
    }

   
    public function update(Request $request, $id)
    {
          //Creamos las reglas de validación
        $rules = [
            'licence_id'=> 'required',
            'name'=> 'required',
            'key'=> 'required',
            'lastAccess'=> 'required|date'
        ];

        $messages = [
            'licence_id.required' => 'La licencia es obligatoria',
            'name.required' => 'El nombre de la terminal es obligatorio',
            'key.required' => 'El keypara la terminal es obligatoria',
            'lastAccess.required' => 'La fecha de último acceso debe ser válida.',
            'lastAccess.date' => 'La Fecha es inválida'
        ];

       $this->validate($request, $rules, $messages);

        $terminal = Terminal::find($id);       
        $terminal->licence_id = $request->input('licence_id');
        $terminal->name = $request->input('name');
        $terminal->key = $request->input('key');
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
        // Permite validar si hay registros relacionados, no poder eliminar el padre.
        // OJO: No deberá estar activada la funcion de Softdelete en las migraciones, ni modelos.
        try {
                Terminal::findOrFail($id)->delete(); 
                return back()->with('notification', 'El terminal ha sido eliminado con éxito.');
        } catch(\Illuminate\Database\QueryException $e) {
            $error = "No se puede eliminar este registro porque tiene otros registros relacionados.";
            return back()->withErrors($error);                
        }       
    }
}
