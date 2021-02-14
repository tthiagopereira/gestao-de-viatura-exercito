<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoViatura extends Model
{

    protected $fillable = [
        'usuario_id','data_saida','data_entrada',
        'hora_saida','hora_entrada','local_saida',
        'destino','missao','viatura','transporte',
        'quantidade_pessoa','status','chefe_viatura',
        'observacao','antecedencia','negar'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function viaturas(){
        return $this->belongsToMany(Viatura::class,'fichas');
    }

    public function fichas(){
        return $this->hasMany(Ficha::class);
    }

}