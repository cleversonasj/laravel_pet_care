<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

    protected $fillable = [
        'foto',
        'nome',
        'especie',
        'raca',
        'data_nascimento',
        'sexo',
        'peso',
        'porte',
        'observacao',
    ];


    // Relacionamentos

    public function vacinas()
    {
        return $this->hasMany(Vacina::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o Vermifugo

    public function vermifugo()
    {
        return $this->hasMany(Vermifugo::class);
    }


    // Mutators

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = ucwords(strtolower($value));
    }

    public function setEspecieAttribute($value)
    {
        if($value === 'Cao')
        {
            $value = 'Cão';
        }
        $this->attributes['especie'] = ucfirst(strtolower($value));
    }

    public function setSexoAttribute($value)
    {
        if($value == 'Femea')
        {
            $value = 'Fêmea';
        }
        $this->attributes['sexo'] = ucfirst(strtolower($value));
    }

    public function setPorteAttribute($value)
    {
        $this->attributes['porte'] = ucfirst(strtolower($value));
    }

    public function setObservacaoAttribute($value)
    {
        if(trim($value) === '')
        {
            $value = 'Não informado.';
        }
        $this->attributes['observacao'] = ucfirst(strtolower($value));
    }

}
