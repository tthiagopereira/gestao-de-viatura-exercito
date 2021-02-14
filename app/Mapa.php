<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $fillable = [
        'chefe_viatura','motorista','missao','itinerario'
        ,'hora_saida','hora_entrada','modelo','placa',
        'eb','documento','contato','contato_motorista',
        'fixo','data','ficha_id','data_inicial','data_final','ficha'
    ];
}
