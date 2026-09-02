<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool        // Tous les produits
    {
        return $user->isAdminOrStorekeeper();
    }
 /**
     * Determine whether the user can view any models.
     */
    public function viewLimited(User $user, Product $product): bool        // Juste workers
    {
        return $user->isWorker() && ($product->company_id === null || $user->company_id === $product->company_id);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool            // Un produit spécifique
    {
        return $user->isAdminOrStorekeeper() && ($product->company_id === null || $user->company_id === $product->company_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdminOrStorekeeper();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        if ($product->company_id === null) {
            return $user->email === config('admin.global_admin_email');
        }

        return $user->isAdminOrStorekeeper() && $user->company_id === $product->company_id;
    }

    public function updateLimited(User $user, Product $product): bool
    {
        return $user->isAdminOrStorekeeper() && $product->company_id === null;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->job === 'admin' && $user->company_id === $product->company_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
