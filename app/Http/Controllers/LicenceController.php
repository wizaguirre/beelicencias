<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Software;
use App\Licence;
use App\Terminal;

class LicenceController extends Controller
{

    public function __construct()
    {

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
            'quantity' => 'required|numeric',
            'started_date'=> 'required|date',
            'due_date'=> 'required|date',
            'message' => 'nullable',
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

        $data = array(
        'customer' => $licence->customer->name,
        'software' => $licence->software->name,
        'quantity' => $licence->quantity,
        'started_date' => $licence->started_date,
        'due_date' => $licence->due_date

        );

        \Mail::send('emails.licence', $data, function($message){
            $message->from('licencias@beesys.net', 'Servicio de licenciamiento Bee');
            $message->to('wizaguirrel@gmail.com', 'alejandra.romero@beesys.net', 'ramses.rivas@gmail.com')->subject('Nueva licencia creada');
        });

        return back()->with ('notification','La Licencia ha sido agregada con éxito');
    }

    
    public function edit($id)
    {

        $licences = Licence::find($id);
        $software = Software::all();
        $customers = Customer::all();

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
        // Permite validar si hay registros relacionados, no poder eliminar el padre.
        // OJO: No deberá estar activada la funcion de Softdelete en las migraciones, ni modelos.
        try {
                Licence::findOrFail($id)->delete(); 
                return back();
        } catch(\Illuminate\Database\QueryException $e) {
            $error = "No se puede eliminar este registro porque tiene otros registros relacionados.";
            return back()->withErrors($error);                
        }

    }

}
