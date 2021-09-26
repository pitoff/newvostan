<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class RequestPropertyController extends Controller
{
    public function index(Property $property)
    {
        return view('request.index', [
            'property' => $property
        ]);
    }
}
