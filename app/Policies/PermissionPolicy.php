<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Models\Permission;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(AdminUser $adminUser): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
   public function viewPermission(AdminUser $model): bool
    {
        if ($model->hasPermission('permission', 'view')) {
            return true;
        }
        return false;
    }
    public function createPermission(AdminUser $adminUser): bool
    {
         if ($adminUser->hasPermission('permission', 'add')) {
            return true;
        }
        return false;
    }
    
    /**
     * Determine whether the user can create models.
     */
    
    /**
     * Determine whether the user can update the model.
     */
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

    /**
     * Determine whether the user can delete the model.
     */
   public function deletePermission(AdminUser $adminUser): bool
    {
        if ($adminUser->hasPermission('permission', 'delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AdminUser $adminUser, Permission $permission): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AdminUser $adminUser, Permission $permission): bool
    {
        return false;
    }
}
