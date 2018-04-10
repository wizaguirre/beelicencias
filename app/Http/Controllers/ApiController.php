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

    public function show($id)
    {
        return Customer::find($id);
    }

    public function licenceShow($customer_id, $software_id){

        return Licence::where('customer_id', $customer_id)->where('software_id', $software_id)->get();
    }

    public function showTerminalsbyLicence($licence_id)
    {
        return Terminal::where('licence_id', $licence_id)->get();
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
            'Mensaje' => 'Registro guardado con éxito'
        ], 200);
    }

}
