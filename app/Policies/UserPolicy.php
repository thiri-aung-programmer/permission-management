<?php

namespace App\Policies;
use Illuminate\Support\Facades\Auth;

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
        if ((strtolower(Auth::user()->role->name)==="admin")||($model->hasPermission('user', 'view'))) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(AdminUser $adminUser): bool
    {
         if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('user', 'add')) {
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
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('user', 'edit')) {
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
        if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('user', 'delete')) {
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
    //permission အတွက်
     
    public function viewPermission(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        // dd($authUser->hasPermission('permission', 'view'));
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('permission', 'view')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }
     public function createPermission(AdminUser $adminUser): bool
    {
         if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('permission', 'add')) {
            return true;
        }
        return false;
    }
    public function updatePermission(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('permission', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }
     public function deletePermission(AdminUser $adminUser): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('permission', 'delete')) {
            return true;
        }
        return false;
    }
    // role အတွက်
     public function viewRole(AdminUser $model): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$model->hasPermission('role', 'view')) {
            return true;
        }
        return false;
    }

    public function createRole(AdminUser $adminUser): bool
    {
         if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('role', 'add')) {
            return true;
        }
        return false;
    }

    public function updateRole(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('role', 'edit')) {
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
        if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('role', 'delete')) {
            return true;
        }
        return false;
    }

     // feature အတွက်
     public function viewFeature(AdminUser $model): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$model->hasPermission('feature', 'view')) {
            return true;
        }
        return false;
    }

    public function createFeature(AdminUser $adminUser): bool
    {
         if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('feature', 'add')) {
            return true;
        }
        return false;
    }

    public function updateFeature(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('feature', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteFeature(AdminUser $adminUser): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('feature', 'delete')) {
            return true;
        }
        return false;
    }


    // Stock အတွက်
     public function viewStock(AdminUser $model): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$model->hasPermission('stock', 'view')) {
            return true;
        }
        return false;
    }

    public function createStock(AdminUser $adminUser): bool
    {
         if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('stock', 'add')) {
            return true;
        }
        return false;
    }

    public function updateStock(AdminUser $authUser, AdminUser $targetUser): bool
    {
        // 🔐 Permission based (edit-user)
        //  dd($targetUser->id);
        if ((strtolower(Auth::user()->role->name)==="admin")||$authUser->hasPermission('stock', 'edit')) {
            return true;
        }
       
        // 👤 Owner based (edit own profile)
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteStock(AdminUser $adminUser): bool
    {
        if ((strtolower(Auth::user()->role->name)==="admin")||$adminUser->hasPermission('stock', 'delete')) {
            return true;
        }
        return false;
    }
}
