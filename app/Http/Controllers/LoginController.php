<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function create()
    {
        return view('login.cadastrar');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->nome = $request->nome;
            $user->email = $request->email;
            $user->senha = $request->senha;
            $user->data_nascimento = $request->data_nascimento;
            $user->genero = $request->genero;

            $user->save();

            Auth::login($user);

            return redirect()->route('home.index')->with('user', $user);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o usuário.');
        }
    }

    public function login(LoginUserRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if ($user == null) {
                return redirect()->back()->with('error', 'Email não cadastrado!');
            }

            if (!Hash::check($request->senha, $user->senha)) {
                return redirect()->back()->with('error', 'Senha incorreta!');
            }

            Auth::login($user);

            return redirect()->route('home.index')->with('user', $user);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao fazer o login.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
