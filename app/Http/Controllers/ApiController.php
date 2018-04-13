<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Licence;
use App\Terminal;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show($cedularuc)
    {
        $customer = Customer::where('cedularuc', $cedularuc)->get();

        if(!$customer->isEmpty()) {
            return $customer;
        } else {
            return response()->json([
            'Status' => 'Error',
            'Mensaje' => 'El registro no existe',
            'Codigo' => 404
            ], 404);
        }
        
    }

    public function licenceShow($customer_id, $software_id){

        $licence = Licence::where('customer_id', $customer_id)->where('software_id', $software_id)->get();

        if (!$licence->isEmpty()) {
            return $licence;
        } else {
            return response()->json([
            'Status' => 'Error',
            'Mensaje' => 'El registro no existe',
            'Codigo' => 404
            ], 404);
        }
         
    }

    public function showTerminalsbyLicence($licence_id)
    {
        $terminal = Terminal::where('licence_id', $licence_id)->get();

        if(!$terminal->isEmpty()){
            return $terminal;
        } else {
            return response()->json([
            'Status' => 'Error',
            'Mensaje' => 'El registro no existe',
            'Codigo' => 404
            ], 404);
        } 
    }

    public function addTerminal(Request $request)
    {
        $t = new Terminal();
        $t->name = $request->input('name');
        $t->key = $request->input('key');
        $t->lastAccess = $request->input('lastAccess');
        $t->licence_id = $request->input('licence_id');

        $t->save();

        return response()->json([
            'Status' => 'OK',
            'Mensaje' => 'Registro guardado con éxito',
            'Codigo' => 200
        ], 200);
    }

}
