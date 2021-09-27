<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\RequestProperty;
use Illuminate\Http\Request;

class RequestPropertyController extends Controller
{
    public function index(Property $property)
    {
        return view('request.index', [
            'property' => $property
        ]);
    }

    public function store(Property $property, Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'phonenumber' => 'required',
            'body' => 'required'
        ]);

        $property->requestProperty()->create([
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'body' => $request->body
        ]);

        return back()->with('success', 'You have successfully requested a property');
    }
}
