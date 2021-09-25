<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function before(User $user, $ability)
    {
        if($user->is_admin){
            return true;
        }
    }

    public function update(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }

    public function delete(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }
}
