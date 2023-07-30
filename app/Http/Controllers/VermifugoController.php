<?php

namespace App\Http\Controllers;

use App\Http\Requests\VermifugoRequest;
use App\Models\Animal;
use App\Models\Vermifugo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VermifugoController extends Controller
{
    public function listar($pet_id)
    {
        $vermifugos = Vermifugo::where('animal_id', $pet_id)->get();
        $animal = Animal::find($pet_id);

        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        return view('vermifugo.listar', compact('vermifugos', 'animal'));
    }

    public function create($pet_id)
    {
        $animal = Animal::find($pet_id);

        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }
        
        return view('vermifugo.cadastrar', compact('animal'));
    }

    public function store(VermifugoRequest $request)
    {
        try {
            $animal = Animal::findOrFail($request->animal_id);
            if($animal->user_id !== auth()->user()->id){
                return redirect()->back();
            }

            $vermifugo = Vermifugo::create($request->all());
            
            return redirect()->route('vermifugos.listar', $vermifugo->animal_id)->with('success', 'Vermifugo cadastrado com sucesso!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
                
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o vermifugo.');
        }

    }

    public function destroy($id)
    {
        $vermifugo = Vermifugo::findOrFail($id);
        $animal = Animal::findOrFail($vermifugo->animal_id);
        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        $vermifugo->delete();

        return redirect()->route('vermifugos.listar', $vermifugo->animal_id)->with('success', 'Vermifugo excluído com sucesso!');
    }

    public function edit($id)
    {
        $vermifugo = Vermifugo::findOrFail($id);
        $animal = Animal::findOrFail($vermifugo->animal_id);

        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        return view('vermifugo.editar', compact('vermifugo', 'animal'));
    }

    public function update(VermifugoRequest $request, $id)
    {
        try{
            $vermifugo = Vermifugo::findOrFail($id);
            $animal = Animal::findOrFail($vermifugo->animal_id);
            if($animal->user_id !== auth()->user()->id){
                return redirect()->back();
            }
            $vermifugo->update($request->all());

            return redirect()->route('vermifugos.listar', $vermifugo->animal_id)->with('success', 'Vermifugo atualizado com sucesso!');
            
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o vermifugo.');
        }

    }
}
