<?php

namespace App\Policies;

use App\Models\Tweet;
use App\Models\User;

use function Pest\Laravel\delete;

class TweetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tweet $tweet): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tweet $tweet): bool
    {
        // Every user who can delete a given tweet can also modify it
        return $this->delete($user, $tweet);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tweet $tweet): bool
    {
        return $tweet->user()->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tweet $tweet): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tweet $tweet): bool
    {
        //
    }
}
