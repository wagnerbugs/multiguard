<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request)
    {
        //Validação dos dados
        $request->validate([
          'name'      =>'required',
          'email'     =>'required|email|unique:users,email',
          'password'  =>'required|min:5|max:30',
          'cpassword' =>'required|min:5|max:30|same:password'
        ]);

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = \Hash::make($request->password);
        $save           = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'Registro realizado com sucesso');
        } else {
            return redirect()->back()->with('fail', 'Um erro impediu o seu cadastro');
        }
    }

    public function check(Request $request)
    {
        //Validação dos inputs
        $request->validate([
          'email'     =>'required|email|exists:users,email',
          'password'  =>'required|min:5|max:30'
        ], [
          'email.exists'=>'E-mail não cadastrado no sistema'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Dados incorretos');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
