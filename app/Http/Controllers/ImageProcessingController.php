<?php

namespace App\Http\Controllers;

use App\ImageProcessing;
use App\Storage;
use Illuminate\Http\Request;

class ImageProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saving file locally
        $path = $request->file('image')->store('images');
        //saving images to AWS
        $path = $request->file('image')->store('images', 's3');

        $image = ImageProcessing::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);
        return Storage::disk('s3')->response('images/' . $image->filename);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageProcessing  $imageProcessing
     * @return \Illuminate\Http\Response
     */
    public function show(ImageProcessing $imageProcessing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageProcessing  $imageProcessing
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageProcessing $imageProcessing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageProcessing  $imageProcessing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProcessing $imageProcessing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageProcessing  $imageProcessing
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageProcessing $imageProcessing)
    {
        //
    }
}
