<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Licence;
use App\Terminal;



class CustomerController extends Controller
{

    public function __construct(){
       
        $this->middleware('auth');
    }

    public function index()
    {
        //cargo en una variable todos los objetos(Registros)
        $customers = Customer::all();
        //cargo la vista, con todos los objetos (customers)
       return view('customers.index')->with(compact('customers'));
    }

    public function store(Request $request)
    {
        //Creamos las reglas de validación
        $rules = [
            'cedularuc' => 'required|string|max:255|unique:customers,cedularuc',
            'name'=> 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:50|unique:customers,email',
            'phone' => 'required|digits:8'

        ];

        $messages = [
            'cedularuc.required' => 'El RUC o cedula del cliente es obligatorio',
            'cedularuc.string' => 'El RUC o cedula del cliente debe ser válido',
            'cedularuc.max' => 'El RUC o cedula del cliente excede el maximo permitido',
            'cedularuc.unique' => 'El RUC o cedula ya existe',

            'name.required' => 'El nombre del cliente es obligatorio',
            'name.string' => 'Debe de poner un nombre válido',
            'name.max' => 'El nombre excede el maximo permitido',

            'contact.required' => 'El contacto del cliente es obligatorio',
            'contact.string' => 'Debe de poner un contacto válido',
            'contact.max' => 'El contacto excede el maximo permitido',

            'email.required' => 'El email del cliente es obligatorio',
            'email.email' => 'Debe de poner un email válido',
            'email.max' => 'El email excede el maximo permitido',
            'email.unique' => 'El email ya existe',

            'phone.required' => 'El telefono del cliente es obligatorio',
            'phone.digits' => 'Debe de poner un teléfono válido'

        ];

       $this->validate($request, $rules, $messages);

        $customer = new Customer();
        $customer->cedularuc = $request->input('cedularuc');
        $customer->name = $request->input('name');
        $customer->contact = $request->input('contact');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');

        $customer->save();

        return back()->with ('notification','El Cliente ha sido agregado con éxito');

    }

    public function edit($id)
    {

        $customer = Customer::find($id);
        return view('customers.edit')->with(compact('customer')); 
    }

    public function update(Request $request, $id)
    {
        //Creamos las reglas de validación
        $rules = [
            'cedularuc' => 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'phone' => 'required|digits:8'

        ];

        $messages = [
            'cedularuc.required' => 'El RUC o cedula del cliente es obligatorio',
            'cedularuc.string' => 'El RUC o cedula del cliente debe ser válido',
            'cedularuc.max' => 'El RUC o cedula del cliente excede el maximo permitido',

            'name.required' => 'El nombre del cliente es obligatorio',
            'name.string' => 'Debe de poner un nombre válido',
            'name.max' => 'El nombre excede el maximo permitido',

            'contact.required' => 'El contacto del cliente es obligatorio',
            'contact.string' => 'Debe de poner un contacto válido',
            'contact.max' => 'El contacto excede el maximo permitido',

            'email.required' => 'El email del cliente es obligatorio',
            'email.email' => 'Debe de poner un email válido',
            'email.max' => 'El email excede el maximo permitido',

            'phone.required' => 'El telefono del cliente es obligatorio',
            'phone.digits' => 'Debe de poner un teléfono válido'

        ];

        $this->validate($request, $rules, $messages);

        $customer = Customer::find($id);
        $customer->cedularuc = $request->input('cedularuc');
        $customer->name = $request->input('name');
        $customer->contact = $request->input('contact');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');

        $customer->save();

        return back()->with ('notification','El Cliente ha sido modificado con éxito');  

    }

    public function destroy($id)
    {
        // Permite validar si hay registros relacionados, no poder eliminar el padre.
        // OJO: No deberá estar activada la funcion de Softdelete en las migraciones, ni modelos.       
       try {
                Customer::findOrFail($id)->delete(); 
                return back()->with('notification', 'El cliente ha sido eliminado con éxito.');
        } catch(\Illuminate\Database\QueryException $e) {
            $error = "No se puede eliminar este registro porque tiene otros registros relacionados.";
            return back()->withErrors($error);                
        }
    }

}
