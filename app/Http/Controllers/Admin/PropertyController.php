<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();

        $property->fill([
            'surface' => 40,
            'rooms' => 4,
            'bedrooms ' => 1,
            'floor' => 0,
            'city' => 'Montpeliers',
            'code_postal' => 34000,
            'sold' => false,

        ]);

        return view('admin.properties.form', [
            'property' =>  $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {

        $property = Property::create($request->validated());
        $property->options()->sync($request->input('options'));
        if($request->hasFile('pictures'))
        {
            $files = $request->file('pictures');
            $property->attachFiles($files);
        }
        
        return to_route('admin.property.index')->with('success', 'Le bien a été ajouté avec succés');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
              
        $property->update($request->validated());
        $property->options()->sync($request->input('options', []));
        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
            $property->attachFiles($files);
        }
        return to_route('admin.property.index')->with('success', 'Le bien a été mis à jour avec succés');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
      
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé avec succés');
    }
}
