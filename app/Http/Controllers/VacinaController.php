<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaRequest;
use App\Models\Animal;
use App\Models\Vacina;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VacinaController extends Controller
{

    public function create($pet_id)
    {
        $animal = Animal::findOrFail($pet_id);

        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }
        
        return view('vacina.cadastrar', compact('animal'));
    }


    public function listar($pet_id)
    {
        $vacinas = Vacina::where('animal_id', $pet_id)->get();

        $animal = Animal::findOrFail($pet_id);
        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        return view('vacina.listar', compact('vacinas', 'animal'));

    }

    public function store(VacinaRequest $request)
    {
        try {

            $animal = Animal::findOrFail($request->animal_id);
            
            if($animal->user_id !== auth()->user()->id){
                return redirect()->back();
            }

            $vacina = Vacina::create($request->all());

            return redirect()->route('vacinas.listar', $vacina->animal_id)->with('success', 'Vacina cadastrada com sucesso!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a vacina.');
        }
    }

    public function destroy($id)
    {
        $vacina = Vacina::findOrFail($id);

        $animal = Animal::findOrFail($vacina->animal_id);
        if($animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        $vacina->delete();

        return redirect()->route('vacinas.listar', $vacina->animal_id)->with('success', 'Vacina excluída com sucesso!');
    }

    public function edit($id)
    {
        $vacina = Vacina::findOrFail($id);
        $animal = Animal::findOrFail($vacina->animal_id);
        
        if($vacina->animal->user_id !== auth()->user()->id){
            return redirect()->back();
        }

        return view('vacina.editar', compact('vacina', 'animal'));
    }

    public function update(VacinaRequest $request, $id)
    {
        try{
            $vacina = Vacina::findOrFail($id);

            if($vacina->animal->user_id !== auth()->user()->id){
                return redirect()->back();
            }

            $vacina->update($request->all());
            
            return redirect()->route('vacinas.listar', $vacina->animal_id)->with('success', 'Vacina atualizada com sucesso!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a vacina.');
        }

        
    }
}
