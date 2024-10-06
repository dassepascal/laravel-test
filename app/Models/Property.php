<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug', //slug = url friendly
        'description',
        'surface'  ,
        'rooms' ,
        'bedrooms',
        'floor' ,
        'price' ,
        'city' ,
        'address' ,
        'postal_code' ,
        'sold' ,

    ];
    /**
     * Get the options for the property.
     */

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
    /**
     * Get the slug associated with the property.
     *
     * @return string
     */

    public function getSlug(){
        return Str::slug($this->title);
    }
}
