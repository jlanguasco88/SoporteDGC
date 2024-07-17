<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
