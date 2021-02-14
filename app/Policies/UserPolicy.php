<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */

    public function restrito(User $user){
        if($user->tipo === 'Administrador'){
            return true;
        }
    }

    public function view(User $user)
    {
        if($user->tipo === 'Administrador'){
            return true;
        }elseif($user->tipo === 'Gerente'){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->tipo === 'Administrador'){
            return true;
        }elseif($user->tipo === 'Gerente'){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user)
    {
        if($user->tipo === 'Administrador'){
            return true;
        }elseif($user->tipo === 'Gerente'){
            return true;
        }elseif($user->tipo == 'Usuario'){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        if($user->tipo === 'Administrador'){
            return true;
        }elseif($user->tipo === 'Gerente'){
            return true;
        }
    }
}
