<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Stream;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Glide\ServerFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    public function show(Request $request,Filesystem $filesystem, string $path): StreamedResponse
    {

        dd($path);
      $server =  ServerFactory::create([
        // dd($request->all()),
            'response' => new LaravelResponseFactory($request),
            'source'=>Storage::disk('public')->getDriver(),//$filesystem->getDriver(),
            'cache'=> Storage::disk('local')->getDriver(),//$filesystem->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'images'
        ]);

        return $server->getImageResponse($path, $request->all());
 
               
    }
}
