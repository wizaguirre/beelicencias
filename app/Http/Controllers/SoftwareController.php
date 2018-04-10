<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Software;

class SoftwareController extends Controller
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
        $software = Software::all();
        //cargo la vista, con todos los objetos (customers)
       return view('software.index')->with(compact('software'));    

   }

   public function store(Request $request)
    {
        //Creamos las reglas de validación
        $rules = [
            'name'=> 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.string' => 'Debe de poner un nombre válido',
            'name.max' => 'El nombre excede el maximo permitido',

        ];

       $this->validate($request, $rules, $messages);

        $software = new Software();
        $software->name = $request->input('name');
        $software->save();

        return back()->with ('notifications','El software ha sido agregado con éxito');
    }

   
    public function edit($id)
    {
         //cargo en una variable todos los objetos(Registros)
        $software = Software::find($id);
        //cargo la vista, con todos los objetos (customers)
       return view('software.edit')->with(compact('software'));    
    }

    public function update(Request $request, $id)
    {
        //Creamos las reglas de validación
        $rules = [
            'name'=> 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.string' => 'Debe de poner un nombre válido',
            'name.max' => 'El nombre excede el maximo permitido',

        ];

       $this->validate($request, $rules, $messages);

        $software =   Software::find($id);
        $software->name = $request->input('name');
        $software->save();

        return back()->with ('notifications','El software ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();
        return back();    }
}
