<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\User;
Use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::where('role', 1)->get();
        $users = User::all();
        return view('users.index')->with(compact('users'));
    }
    public function store(Request $request){
    	$rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    	];
    	$messages = [
    		'name.required' => 'El nombre del usuario es obligatorio.',
    		'name.max' =>'El nombre de usuario es demasiado largo.',
            'name.string' => 'El nombre solo acepta caracteres alfabeticos.',
    		'email.required' => 'El Email es obligatorio.',
    		'email.email' => 'El Email ingresado no es válido.',
    		'email.max' => 'El Email es demasiado largo.',
    		'email.unique' => 'El Email ingresado ya se encuentra en uso.',
    		'password.required' => 'La contraseña es obligatorio.',
    		'password.min' => 'La contraseña debe ser almenos de 6 caracteres.',
    	];

    	$this->validate($request, $rules, $messages);

        $user = new User();
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));

        // Si existe una imágen de avatar
        if(!$request->avatar == null){
            // El nombre del archivo será: El ID del usuario que lo crea, más el tiempo en ms y su extensión
            $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
            
            // Se guarda el archivo con el nombre compuesto en la carpeta pública
            $request->avatar->move(public_path('/uploads/avatars'), $filename);
            $user->avatar = 'uploads/avatars/'.$filename;
        } else {
            $user->avatar = 'uploads/avatars/default_avatar.jpg';
        }
      
    	$user->save();
    	return back()->with('notification', 'El usuario ha sido creado con éxito.');    	
    }
    public function edit($id){
    	$user = User::find($id);
    	return view('users.edit')->with(compact('user'));
    }
    public function update($id, Request $request){
        $rules = [
            'name' => 'required|string|max:255',           
            'password' => 'nullable|min:6',
        ];
        $messages = [
            'name.required' => 'El nombre del usuario es obligatorio.',
            'name.max' =>'El nombre de usuario es demasiado largo.',
            'name.string' => 'El nombre solo acepta caracteres alfabeticos.',         
            'password.min' => 'La contraseña debe ser almenos de 6 caracteres.',         
        ];
        $this->validate($request, $rules, $messages);
        $user = User::find($id);
        $user->name = $request->input('name');
        $password = $request->input('password');
        if($password)
            $user->password = bcrypt($password);
        $user->save();
        return back()->with('notification', 'El usuario ha sido modificado con éxito.');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('notification', 'El usuario ha sido eliminado con éxito.');
    }
}