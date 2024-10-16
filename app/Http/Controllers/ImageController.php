<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Glide\ServerFactory;
use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;


class ImageController extends Controller
{
    public function show(Request $request, string $path)
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => Storage::disk('public'),
            'cache' => Storage::disk('local'),
            'cache_path_prefix' => '.cache',
            'base_url' => 'images',


        ]);
        return $server->getImageResponse($path, $request->all());
    }
}
