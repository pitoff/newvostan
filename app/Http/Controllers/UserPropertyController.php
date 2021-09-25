<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPropertyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function mylisting(User $user)
    {
        $property = $user->properties()->get();
        return view('agent.mylisting', [
            'user' => $user,
            'property' => $property
        ]);
    }
}
