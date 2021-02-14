<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
//        'name', 'email', 'password','nome_guerra','posto_graduacao','identidade_militar','om','contato','escalao','funcao','tipo'
        'name', 'password','nome_guerra','posto_graduacao','identidade_militar','contato','escalao','tipo'
    ];

    public function servicoViatura(){
        return $this->hasMany('App\ServicoViatura','usuario_id');
    }

    public function motoristas(){
        return $this->hasMany(Motorista::class);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
