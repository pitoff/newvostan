<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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
        return $user->id === $property->user_id
        ? Response::allow()
        : Response::deny('You are not the owner of this property');
    }

    public function delete(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }
}
