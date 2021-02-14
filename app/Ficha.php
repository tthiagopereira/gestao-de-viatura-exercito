<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $fillable = [
        'chefe_viatura',
        'servico_viatura_id','viatura_id',
        'posto_chefe_de_viatura','contato','itinerario','data','motorista_id'
    ];
    public function viaturas() {
        return $this->belongsTo(Viatura::class,'viatura_id');
    }

    public function servicos() {
        return $this->belongsTo(ServicoViatura::class,'servico_viatura_id');
    }

    public function motoristas() {
        return $this->belongsTo(Motorista::class,'motorista_id');
    }

}
