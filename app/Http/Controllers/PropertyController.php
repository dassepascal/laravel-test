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
        $properties = Property::paginate(16);
        return view('properties.index', [
            'properties' => $properties
        ]);
    }

    public function show(Property $property){
        return view('properties.show', compact('property'));
    }
}
