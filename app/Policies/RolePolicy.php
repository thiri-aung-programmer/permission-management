<?php

namespace App\Policies;

use App\Models\AdminUser;
 use App\Models\Role;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(Role $Role): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function viewRole(AdminUser $model): bool
    {
        if ($model->hasPermission('role', 'view')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function createRole(AdminUser $adminUser): bool
    {
         if ($adminUser->hasPermission('role', 'add')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    
    public function updateRole(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ($authUser->hasPermission('role', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }
    public function updatePermission(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ($authUser->hasPermission('permission', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }
    public function viewPermission(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        // dd($authUser->hasPermission('permission', 'view'));
        if ($authUser->hasPermission('permission', 'view')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function deleteRole(AdminUser $adminUser): bool
    {
        if ($adminUser->hasPermission('role', 'delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AdminUser $adminUser, Role $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AdminUser $adminUser, Role $model): bool
    {
        return false;
    }
}
