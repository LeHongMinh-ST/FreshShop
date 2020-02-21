<?php

namespace App\Policies;

use App\Import;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any imports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function view(User $user, Import $import)
    {
        //
    }

    /**
     * Determine whether the user can create imports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function update(User $user, Import $import)
    {
        //
    }

    /**
     * Determine whether the user can delete the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function delete(User $user, Import $import)
    {
        //
    }

    /**
     * Determine whether the user can restore the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function restore(User $user, Import $import)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function forceDelete(User $user, Import $import)
    {
        return $user->role ==1;
    }
}
