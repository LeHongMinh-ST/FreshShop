<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 1 ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Models\User $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if ($user->role == 1 || $model->id = $user->id) return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role == 1) return true;
        else return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Models\User $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return($user->id == $model->id);
    }

    public function updateRole(User $user,User $model)
    {
        return ($user->role == 1 );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Models\User $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        if ($user->role == 1 && $user->id != $model->id  && $model->role !=1) return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\User $user
     * @param \App\Models\User $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\User $user
     * @param \App\Models\User $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
