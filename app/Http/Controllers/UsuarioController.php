<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $animaisDoUsuario = Animal::where('user_id', $usuario->id)->get();

        return view('usuario.index', compact('usuario', 'animaisDoUsuario'));
    }

    public function edit($id)
    {
        $usuario = auth()->user();

        return view('usuario.editar', compact('usuario'));
    }

    public function update(UserRequest $request, $id)
    {
        $usuario = User::findOrfail($id);

        try{

            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $requestImage = $request->foto;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $request->foto->move(public_path('img/usuarios'), $imageName);
                //se tiver uma foto antes, excluir da pasta public
                if(isset($usuario->foto)){
                    unlink(public_path('img/usuarios/' . $usuario->foto));
                }
                $usuario->foto = $imageName;
            }

            if($request->senha != $request->confirmar_senha){
                return redirect()->route('usuario.index')->with('error', 'As senhas não coincidem!');
            }

            $usuario->nome = $request->nome;
            $usuario->data_nascimento = $request->data_nascimento;
            $usuario->genero = $request->genero;
            $usuario->senha = bcrypt($request->senha);
            $usuario->save();            

            return redirect()->route('usuario.index')->with('success', 'Usuário atualizado com sucesso!');

        }catch(\Exception $e){
            
            return redirect()->route('usuario.index')->with('error', 'Erro ao realizar alteração! ' . $e->getMessage());
        }
    }
}
