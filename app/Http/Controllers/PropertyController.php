<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        if($imgFile){
            $fileName = Controller::ImageStr(8). '.' .$request->image->extension();
        }

        if(!File::exists('properties')){
            File::makeDirectory('properties\images', 0755, true, true);
        }

        $createProperty = $request->user()->properties()->create([
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

        if($createProperty){
            $imagePath = 'properties/images/';
            $imgFile->move($imagePath, $fileName);

            return redirect(route('listing'));

        }

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
            'image' => 'file|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            'type' => '',
            'for' => '',
            'state' => '',
            'lga' => '',
            'address' => 'required',
            'description' => 'required',
            'price' => 'required',
            'bedroom' => 'required',
            'toilet' => 'required',
            'kitchen' => 'required',
        ]);

        $imgFile = $request->file('image');

        if($imgFile){
            $fileName = Controller::ImageStr(8). '.' .$request->image->extension();
        }

        $this->authorize('update', $property);

        $updateProperty = $property->update([
            'image' => $fileName ?? $property->image,
            'title' => $request->title,
            'p_type' => $request->type ?? $property->p_type,
            'p_for' => $request->for ?? $property->p_for,
            'state' => $request->state ?? $property->state,
            'lga' => $request->lga ?? $property->lga,
            'address' => $request->address,
            'description' => $request->description,
            'price' => $request->price,
            'bedroom' => $request->bedroom,
            'toilet' => $request->toilet,
            'kitchen' => $request->kitchen,
        ]);

        if($updateProperty){
            $imagePath = 'properties/images/';
            $imgFile->move($imagePath, $fileName);

            return redirect(route('listing'));

        }
        
    }

    public function destroy(Property $property)
    {
        $this->authorize('delete', $property);
        $property->delete();

        if(File::exists(public_path('properties/images/'.$property->image))){
            File::delete(public_path('properties/images/'.$property->image));
        }

        return back();
    }

}
