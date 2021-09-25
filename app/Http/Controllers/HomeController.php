<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function services()
    {
        return view('home.services');
    }

    public function agent(User $user)
    {
        $user = User::latest()->where('is_admin', false)->get();
        return view('home.agents', [
            'users' => $user
        ]);
    }

    public function singleListing(Property $property)
    {
        return view('home.singleListing', [
            'property' => $property
        ]);
    }

    public function search(Request $request)
    {
        $state = trim($request->get('state'));

        $property = Property::query()->where('state', 'like', "%{$state}%")
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('home.search', [
            'properties' => $property,
            'state' => $state
        ]);
    }

}
