<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(8);
        return view('agent.index', [
            'properties' => $properties
        ]);
    }

    public function create()
    {
        return view('agent.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|file|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            'type' => 'required',
            'for' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'address' => 'required',
            'description' => 'required',
            'price' => 'required',
            'bedroom' => 'required',
            'toilet' => 'required',
            'kitchen' => 'required',
        ]);

        $imgFile = $request->file('image');
        $fileName = time(). '.' .$imgFile->getClientOriginalName();

        $request->user()->properties()->create([
            'image' => $fileName,
            'title' => $request->title,
            'p_type' => $request->type,
            'p_for' => $request->for,
            'state' => $request->state,
            'lga' => $request->lga,
            'address' => $request->address,
            'description' => $request->description,
            'price' => $request->price,
            'bedroom' => $request->bedroom,
            'toilet' => $request->toilet,
            'kitchen' => $request->kitchen,
        ]);
        $imgFile->move(public_path('\properties\images'), $fileName);
        return redirect(route('agent.dashboard'));
    }

    public function edit(Property $property)
    {
        return view('agent.edit', [
            'property' => $property
        ]);
    }

    public function update(Property $property, Request $request)
    {
        request()->validate([
            'image' => 'required|file|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            'type' => 'required',
            'for' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'address' => 'required',
            'description' => 'required',
            'price' => 'required',
            'bedroom' => 'required',
            'toilet' => 'required',
            'kitchen' => 'required',
        ]);

        $imgFile = $request->file('image');
        if($imgFile){
            $fileName = time(). '.' .$imgFile->getClientOriginalName();
            $imgFile->move(public_path('\properties\images'), $fileName);
        }
        
        $property->update([
            'image' => $fileName,
            'title' => $request->title,
            'p_type' => $request->type,
            'p_for' => $request->for,
            'state' => $request->state,
            'lga' => $request->lga,
            'address' => $request->address,
            'description' => $request->description,
            'price' => $request->price,
            'bedroom' => $request->bedroom,
            'toilet' => $request->toilet,
            'kitchen' => $request->kitchen,
        ]);
        
        return redirect(route('agent.dashboard'));
    }

    public function destroy(Property $property)
    {
        $this->authorize('delete', $property);
        $property->delete();
        return back();
    }

}
