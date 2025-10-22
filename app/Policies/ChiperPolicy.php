<?php

namespace App\Policies;

use App\Models\Chiper;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChiperPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chiper $chiper): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chiper $chiper): bool
    {
        return $chiper->user()->is($user);;
    }

    /**
     * ``Determine whether the user can delete the model.
     */
    public function delete(User $user, Chiper $chiper): bool
    {
        return $chiper->user()->is($user);;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chiper $chiper): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chiper $chiper): bool
    {
        return false;
    }
}
