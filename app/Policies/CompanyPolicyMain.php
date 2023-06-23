<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicyMain
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Company $company): bool
    {
        return $user->belongsToCompany($company) || $user->can('view_any_company');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Company $company): bool
    {
        return $user->ownsCompany($company) || $user->can('update_company');
    }

    /**
     * Determine whether the user can add company employees.
     */
    public function addCompanyEmployee(User $user, Company $company): bool
    {
        return $user->ownsCompany($company);
    }

    /**
     * Determine whether the user can update company employee permissions.
     */
    public function updateCompanyEmployee(User $user, Company $company): bool
    {
        return $user->ownsCompany($company);
    }

    /**
     * Determine whether the user can remove company employees.
     */
    public function removeCompanyEmployee(User $user, Company $company): bool
    {
        return $user->ownsCompany($company);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Company $company): bool
    {
        return $user->ownsCompany($company) || $user->can('delete_company');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_company');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Company $company)
    {
        return $user->can('force_delete_company');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_company');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Company $company)
    {
        return $user->can('restore_company');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_company');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Company $company)
    {
        return $user->can('replicate_company');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_company');
    }
}
