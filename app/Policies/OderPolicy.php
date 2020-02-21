<?php

namespace App\Policies;

use App\Oder;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any oders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the oder.
     *
     * @param  \App\User  $user
     * @param  \App\Oder  $oder
     * @return mixed
     */
    public function view(User $user, Oder $oder)
    {
        //
    }

    /**
     * Determine whether the user can create oders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the oder.
     *
     * @param  \App\User  $user
     * @param  \App\Oder  $oder
     * @return mixed
     */
    public function update(User $user, Oder $oder)
    {
        //
    }

    /**
     * Determine whether the user can delete the oder.
     *
     * @param  \App\User  $user
     * @param  \App\Oder  $oder
     * @return mixed
     */
    public function delete(User $user, Oder $oder)
    {
       //
    }

    /**
     * Determine whether the user can restore the oder.
     *
     * @param  \App\User  $user
     * @param  \App\Oder  $oder
     * @return mixed
     */
    public function restore(User $user, Oder $oder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the oder.
     *
     * @param  \App\User  $user
     * @param  \App\Oder  $oder
     * @return mixed
     */
    public function forceDelete(User $user, Oder $oder)
    {
        return $user->role == 1;
    }
}
