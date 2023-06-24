<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Periphel;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriphelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Periphel $periphel)
    {
        return
            $user->can('view_periphel') ||
            $user->hasComapanyModel($periphel);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Periphel $periphel)
    {
        return
            $user->can('update_periphel') ||
            $user->hasComapanyModel($periphel);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Periphel $periphel)
    {
        return
            $user->can('delete_periphel') ||
            $user->hasComapanyModel($periphel);
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return
            $user->can('delete_any_periphel') ||
            $user->ownedCompanies();
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Periphel $periphel)
    {
        return
            $user->can('force_delete_periphel') ||
            $user->ownedCompanies();;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_periphel');
    }

    /**
     * Determine whether the user can restore.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Periphel $periphel)
    {
        return
            $user->can('restore_periphel') ||
            $user->ownedCompanies();
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return
            $user->can('restore_any_periphel') ||
            $user->ownedCompanies();
    }

    /**
     * Determine whether the user can replicate.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Periphel $periphel)
    {
        return $user->can('replicate_periphel');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_periphel');
    }
}
