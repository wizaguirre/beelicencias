<?php

use Illuminate\Http\Request;
use App\Customer;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clientes', 'ApiController@index');
Route::get('cliente/{cedularuc}', 'ApiController@show');
Route::get('licencia/cliente/{customer_id}/software/{software_id}', 'ApiController@licenceShow');
Route::get('terminales/{id}', 'ApiController@showTerminalsbyLicence');
Route::post('terminales/', 'ApiController@addTerminal');