<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\User;
use App\Models\Vacina;
use App\Models\Vermifugo;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        $racas = Raca::all();

        return view('animal.cadastrar', compact('user', 'racas'));
    }

    public function store(AnimalRequest $request)
    {
        $animal = new Animal();
        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->raca = $request->raca;
        $animal->data_nascimento = $request->data_nascimento;
        $animal->sexo = $request->sexo;
        $animal->peso = $request->peso;
        $animal->porte = $request->porte;
        $animal->foto = $request->foto;
        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->foto->move(public_path('img/animais'), $imageName);
            $animal->foto = $imageName;
        }
        $animal->observacao = $request->observacao;
        $animal->user_id = $request->user_id;
        $animal->save();

        return redirect()->route('animal.listar')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function listar()
    {
        $animais = Animal::all()->where('user_id', auth()->user()->id);

        return view('animal.listar', compact('animais'));
    }

    public function informacoes($id)
    {
        //usuário só pode ver as informações dos animais que ele cadastrou
        $animal = Animal::findOrFail($id);
        
        if($animal->user_id !== auth()->user()->id){
            // redirecionar para a página atual
            return redirect()->back();
        }
        $vacinas = Vacina::all()->where('animal_id', $id);
        $vermifugos = Vermifugo::all()->where('animal_id', $id);
        $tutor = User::findOrfail($animal->user_id);

        return view('animal.informacoes', compact('animal', 'vacinas', 'vermifugos', 'tutor'));
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        
        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }
        $racas = Raca::all();

        return view('animal.editar', compact('animal', 'racas'));
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);

        //deletar a imagem que foi criada na pasta public/img/animais

        $imagePath = public_path() . "/img/animais/" . $animal->foto;
        unlink($imagePath);

        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        $animal->delete();

        return redirect()->route('animal.listar')->with('success', 'Animal excluído com sucesso!');
    }

    public function update(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);        

        if($animal->user_id !== auth()->user()->id) {
            return redirect()->route('animal.listar')->with('error', 'Você não tem permissão para editar este animal!');
        }

        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->raca = $request->raca;
        $animal->data_nascimento = $request->data_nascimento;
        $animal->sexo = $request->sexo;
        $animal->peso = $request->peso;
        $animal->porte = $request->porte;
        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->foto->move(public_path('img/animais'), $imageName);
            if(isset($animal->foto)){
                unlink(public_path('img/animais/' . $animal->foto));
            }
            $animal->foto = $imageName;
        }
        $animal->observacao = $request->observacao;
        $animal->save();

        return redirect()->route('animal.informacoes', $animal->id)->with('success', 'Animal atualizado com sucesso!');
    }
}
