<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\SearchPropertyRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request)
    {

        $query = Property::query()->orderBy('created_at', 'desc')->with('options');
        if ($price = $request->validated('price')) {
            $query =   $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query =     $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query =    $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {

            $query = $query->where('title', 'like', "%{$title}%");
        }
        $properties = Property::paginate(8);
        return view('properties.index', [
            'properties' => $query->paginate(8),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
      
        $expectedSlug = $property->getSlug();
        
        if ($slug !== $expectedSlug) {
          
            return to_route('property.show', ['slug' =>$expectedSlug, 'property' => $property]);
        }
        return view('properties.show', [
            'property' => $property
        ]);
    }
}
