<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(16);
        return view('properties.index', [
            'properties' => $properties
        ]);
    }

    public function show(Property $property){
        return view('properties.show', compact('property'));
    }
}
