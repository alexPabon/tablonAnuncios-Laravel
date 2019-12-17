<?php

namespace App\Policies;

use App\User;
use App\Anuncio;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnuncioPolicy
{
    use HandlesAuthorization;   

    /**
     * Determine whether the user can update the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function update(User $user, Anuncio $anuncio)
    {
        //condicion para poder actualizar anuncio
        return $user->id==$anuncio->user_id || $user->email=='admin@bcn.cat'; 
    }
    
    /**
     * Determine whether the user can Edit the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function edit(User $user, Anuncio $anuncio)
    {
        //condicion para poder editar anuncio
        return $user->id==$anuncio->user_id || $user->email=='admin@bcn.cat';
    }
    
    /**
     * Determine whether the user can delete the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function delete(User $user, Anuncio $anuncio)
    {
        //condicion para poder eliminar anuncio
        return $user->id==$anuncio->user_id || $user->email=='admin@bcn.cat';
    }

    /**
     * Determine whether the user can restore the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function restore(User $user, Anuncio $anuncio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function forceDelete(User $user, Anuncio $anuncio)
    {
        //
    }
}
