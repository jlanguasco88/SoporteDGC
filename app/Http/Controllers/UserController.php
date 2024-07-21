<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $data=request()->validate([
            'username'=>'required',
            'password'=>'required'
        ],
         [
            'username.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',
         ]);
         
         if(Auth::attempt($data))
         {
            $con = 'OK';
         }
         $username=$request->get('username');
         $query=User::where('username','=',$username)->get();
         if($query->count() != 0)
         {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if(password_verify($password,$hashp))
            {
                return view('bienvenido');
            }
            else{
                return back()->withErrors(['password'=>'Contraseña no válida'])->withInput([request('password')]);
            }
         }
         else{
            return back()->withErrors(['username'=>'Usuario no válido'])->withInput([request('username')]);
         }
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
        
    }

    public function index()
    {
        
        $usuarios = User::all();
        
        return view('paginas.usuarios.index', compact('usuarios'));
    }

    public function create()
    {   
        $areas = Area::all();
        // Obtener los valores únicos del campo 'rol'
        $roles = $this->getEnumValues('usuarios', 'rol');

        return view('paginas.usuarios.create',compact('roles','areas'));
        //el formulario donde agregamos los datos
        
    }

    private function getEnumValues($table, $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'"))[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = [];
        foreach(explode(',', $matches[1]) as $value)
        {
            $enum[] = trim($value, "'");
        }

        return $enum;
    }


}
