<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable = [

        'user_id','categoria_a','categoria_b','categoria_c','categoria_d','categoria_e','carteira_motorista','habilitacao','habilitacao_vencimento','bi','observacao'

    ];

    public function usuarios() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function fichas(){
        return $this->hasMany(Ficha::class);
    }

}
