<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Software;
use App\Licence;
use App\Terminal;

class LicenceController extends Controller
{
     //funcion que valida si el usuario está logeado
    public function __construct()
    {
        //Validación del Contructor: Verificar si el usuario está logeado
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        $software = Software::all();
        $licences = Licence::all();


       return view('licences.index')->with(compact('customers'))->with(compact('software'))->with(compact('licences'));
    }


    public function store(Request $request)
    {
          //Creamos las reglas de validación
        $rules = [
            'customer_id' => 'required',
            'software_id' => 'required',
            'quantity' => 'required',
            'quantity' => 'numeric',
            'started_date'=> 'date',
            'due_date'=> 'date',
            'status' => 'boolean'
        ];

        $messages = [
            'customer_id.required' => 'La cliente es obligatoria',
            'software_id.required' => 'El software es obligatorio',
            'quantity.required' => 'La cantidad de Licencias es obligatoria',
            'quantity.numeric' => 'La cantidad de Licencias es errónea',
            'started_date.date' => 'La fecha de inicio debe ser válida',
            'due_date.date' => 'La fecha de fin debe ser válida',
            'status.boolean' => 'El estado debe ser válido',

        ];

       $this->validate($request, $rules, $messages);

        $licence = new Licence();
        $licence->customer_id = $request->input('customer_id');
        $licence->software_id = $request->input('software_id');
        $licence->quantity = $request->input('quantity');
        $licence->started_date = $request->input('started_date');
        $licence->due_date = $request->input('due_date');
        $licence->status = $request->input('status');
        $licence->message = $request->input('message');

        $licence->save();

        return back()->with ('notification','La Licencia ha sido agregada con éxito');
    }

    
    public function edit($id)
    {
          //cargo en una variable todos los objetos(Registros)
        $licences = Licence::find($id);
        $software = Software::all();
        $customers = Customer::all();

        //cargo la vista, con todos los objetos (customers)
       return view('licences.edit')->with(compact('software'))->with(compact('customers'))->with(compact('licences'));  
    }

    public function update(Request $request, $id)
    {
         //Creamos las reglas de validación
        $rules = [
            'customer_id' => 'required',
            'software_id' => 'required',
            'quantity' => 'required',
            'quantity' => 'numeric',
            'started_date'=> 'date',
            'due_date'=> 'date',
            'status' => 'boolean'
        ];

        $messages = [
            'customer_id.required' => 'La cliente es obligatoria',
            'software_id.required' => 'El software es obligatorio',
            'quantity.required' => 'La cantidad de Licencias es obligatoria',
            'quantity.numeric' => 'La cantidad de Licencias es errónea',
            'started_date.date' => 'La fecha de inicio debe ser válida',
            'due_date.date' => 'La fecha de fin debe ser válida',
            'status.boolean' => 'El estado debe ser válido',

        ];

        $this->validate($request, $rules, $messages);


        $licence =  Licence::find($id);
        $licence->customer_id = $request->input('customer_id');
        $licence->software_id = $request->input('software_id');
        $licence->quantity = $request->input('quantity');
        $licence->started_date = $request->input('started_date');
        $licence->due_date = $request->input('due_date');
        $licence->status = $request->input('status');
        $licence->message = $request->input('message');
        $licence->save();

        return back()->with ('notification','La Licencia ha sido actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $licence = Licence::find($id);
        $licence->delete();
        return back();
    }

}
