<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PasswordController extends Controller
{
    public function index()
    {
        return view('senha.index');
    }

    public function sendEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'E-mail não encontrado!');
        }
        

        $token = app('auth.password.broker')->createToken($user);
        //token 5 caracteres
        $token = substr($token, 0, 5);
        $user->remember_token = $token;
        $user->save();

        $data = [
            'user' => $user,
            'token' => $user->remember_token
        ];

        Mail::send('senha.recuperacao', $data, function ($message) use ($data) {
            $message->from('pet_care_casj@hotmail.com', 'PET Care');
            $message->to($data['user']->email);
            $message->subject('Redefinição de senha');
        });

        // permanecer na mesma página gerando a mensagem de success
        return redirect()->back()->with('success', 'E-mail enviado com sucesso!');
    }

    public function reset($token)
    {

        return view('senha.reset', ['token' => $token]);

    }

    public function update(Request $request)
    {
        if (!$request->token) {
            return redirect()->route('login.index')->with('error', 'Token não encontrado!');
        }

        $user = User::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect()->route('login.index')->with('error', 'E-mail ou Token inválido!');
        }

        if(strlen($request->senha) < 8){
            return redirect()->back()->with('error', 'A senha deve conter no mínimo 8 caracteres.');
        }

        if ($request->senha != $request->senha_confirmacao) {
            return redirect()->back()->with('error', 'As senhas não conferem.');
        }

        $user->senha = bcrypt($request->senha);
        $user->save();

        auth()->login($user);
        return redirect()->route('home.index');
        
    }
}
