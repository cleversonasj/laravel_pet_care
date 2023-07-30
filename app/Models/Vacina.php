<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    protected $table = 'vacinas';

    protected $fillable = [
        'nome',
        'descricao',
        'data_aplicacao',
        'proxima_aplicacao',
        'preco',
        'animal_id',
    ];

    protected $dates = [
        'data_aplicacao',
        'proxima_aplicacao'
    ];

    // Relacionamento com o Animal
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    // Mutators

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = ucwords(strtolower($value));
    }

    public function setDescricaoAttribute($value)
    {
        if($value === null || trim($value) === '') {
            $value = 'Não informado.';
        }
        
        $this->attributes['descricao'] = ucfirst(strtolower($value));
    }

    public function setPrecoAttribute($value)
    {
        $this->attributes['preco'] = str_replace(',', '.', $value);
    }


    

    





}
