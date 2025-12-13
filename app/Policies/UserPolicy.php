<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Models\User;

use Illuminate\Auth\Access\Response;

class UserPolicy
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
    public function view(AdminUser $model): bool
    {
        if ($model->hasPermission('user', 'view')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(AdminUser $adminUser): bool
    {
         if ($adminUser->hasPermission('user', 'add')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    
    public function update(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ($authUser->hasPermission('user', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return $authUser->id === $targetUser->id;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(AdminUser $adminUser): bool
    {
        if ($adminUser->hasPermission('user', 'delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AdminUser $adminUser, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AdminUser $adminUser, User $model): bool
    {
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

}
