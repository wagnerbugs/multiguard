<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function showForgotForm()
    {
        return view('dashboard.user.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
        'email'=>'required|email|exists:users,email'
      ], [
        'email.exists'=>'E-mail não cadastrado no sistema'
      ]);

        $token = \Str::random(64);
        DB::table('password_resets')->insert([
          'email'     =>$request->email,
          'token'     =>$token,
          'created_at' =>Carbon::now(),
        ]);

        $name_user_db = DB::table('users')->where('email', $request->email)->first(['name']);
        $name_user = $name_user_db->name;

        $action_link = route('user.reset.password.form', ['token'=>$token, 'email'=>$request->email]);
        $body= "Recebemos a solicitação de resetar a senha para acessar nosso site utilizando o e-mail ".$request->email." Você pode resetar sua senha clicando no link abaixo:";
        \Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function ($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->to($request->email, $request->email)
                    ->subject('Reset Password');
        });

        return back()->with('success', 'Enviamos um e-mail com as instruções de reset.');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('dashboard.user.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
          'email'                 =>'required|email|exists:users,email',
          'password'              =>'required|min:5|confirmed',
          'password_confirmation' =>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
          'email'=>$request->email,
          'token'=>$request->token
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Token Inválido');
        } else {
            User::where('email', $request->email)->update([
              'password'=>\Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
              'email'=>$request->email
            ])->delete();

            return redirect()->route('user.login')->with('info', 'Sua senha foi resetada com sucesso')->with('verifiedEmail', $request->email);
        }
    }
}
