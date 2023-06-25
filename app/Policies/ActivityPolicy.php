<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Activity $activity)
    {
        return $user->can('view_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Activity $activity)
    {
        return $user->can('update_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Activity $activity)
    {
        return $user->can('delete_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Activity $activity)
    {
        return $user->can('force_delete_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Activity $activity)
    {
        return $user->can('restore_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Activity $activity)
    {
        return $user->can('replicate_activity') || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_activity') || $user->isSuperAdmin();
    }
}
