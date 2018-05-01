<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Terminal;
use App\Software;
use App\Licence;

class DashboardController extends Controller
{
    
    public function __construct(){
       
        $this->middleware('auth');
    }

    public function index(){

    	$customers = Customer::count();
    	$terminals = Terminal::count();
    	$software = Software::count();
    	$licences = Licence::count();

    	return view('dashboard')->with(compact('customers'))->with(compact('terminals'))->with(compact('software'))->with(compact('licences'));

    }
}
