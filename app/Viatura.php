<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    protected $fillable = [
        'placa','qtd_passageiro','modelo','viatura','eb','tipo','status','documento'
    ];
    //'servico_viatura_id','viatura_id'
    public function servicos(){
        return $this->belongsToMany(Viatura::class,'fichas');
    }
    public function fichas(){
        return $this->hasMany(Ficha::class);
    }

}
