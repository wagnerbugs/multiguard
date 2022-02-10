<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function create(Request $request)
    {
        //Validação dos dados
        $request->validate([
        'name'      =>'required',
        'email'     =>'required|email|unique:doctors,email',
        'hospital'  =>'required',
        'password'  =>'required|min:5|max:30',
        'cpassword' =>'required|min:5|max:30|same:password'
      ]);

        $doctor           = new Doctor();
        $doctor->name     = $request->name;
        $doctor->email    = $request->email;
        $doctor->hospital = $request->hospital;
        $doctor->password = \Hash::make($request->password);
        $save             = $doctor->save();

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
        'email'     =>'required|email|exists:doctors,email',
        'password'  =>'required|min:5|max:30'
      ], [
        'email.exists'=>'E-mail não cadastrado no sistema'
      ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.home');
        } else {
            return redirect()->route('doctor.login')->with('fail', 'Dados incorretos');
        }
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
