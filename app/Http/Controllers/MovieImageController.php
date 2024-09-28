<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use App\Models\MovieImage;
use Illuminate\Http\Request;

class MovieImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $movieId)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $movie = Movie::findOrFail($movieId);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $img_name = time() . "_image_" . $img->getClientOriginalName();
                $path = public_path('images/moviesimages');
                $img->move($path, $img_name);
                $movie->movie_image()->create([
                    'img' => 'images/moviesimages/' . $img_name,
                ]);
            }
        }

        return redirect()->route('movies.images', $movieId)->with('success', 'Images added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(MovieImage $movieImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieImage $movieImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovieImage $movieImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = MovieImage::findOrFail($id);
        if ($image) {
            if (Storage::disk('public')->exists($image->img)) {
                Storage::disk('public')->delete($image->img);
            } else {
                if (file_exists(public_path($image->img))) {
                    unlink(public_path($image->img));
                }
            }
        }
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
