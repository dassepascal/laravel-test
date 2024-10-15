<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Picture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold',


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

    public function getSlug()
    {
        return Str::slug($this->title);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * Attach the given files to the property.
     *
     * 
     * 
     */
    public function attachFiles(array $files)
    {
        if (!is_array($files)) {
            throw new \InvalidArgumentException('Les fichiers doivent être fournis sous forme de tableau.');
        }
        $pictures = [];
        foreach ($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename = $file->store('properties/' . $this->id, 'public');
            $pictures[] = [
                'filename' => $filename
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function getPicture(): ?Picture
    {
        return $this->pictures[0] ?? null;
    }
}
