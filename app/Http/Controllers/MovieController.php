<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\MovieGenre;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use Illuminate\Http\Request;
use function Laravel\Prompts\select;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('dashboard.movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $genres = MovieGenre::all();
        return view('dashboard.movies.create', ['countries' => $countries, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cast' => 'required|string',
            'trailer' => 'required|url',
            'director' => 'required|string',
            'duration' => 'required|string',
            'release_date' => 'required|date',
            'rating' => 'nullable|numeric|min:0|max:10',
            'country_id' => 'required|exists:countries,id',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre_id' => 'required|exists:movie_genres,id',
        ]);
        $poster_name = time() . "poster" . $request->file('poster')->getClientOriginalName();
        $path_poster = Storage::disk('public')->putFileAs('images/moviesposter', $request->poster, $poster_name);
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description  = $request->description;
        $movie->cast = $request->cast;
        $movie->trailer_url = $request->trailer;
        $movie->director = $request->director;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->rating = $request->rating;
        $movie->country_id = $request->country_id;
        $movie->poster   = $path_poster;
        $movie->save();
        foreach ($request->image as $img) {
            $img_name = time() . "image" . $img->getClientOriginalName();
            $path_img = Storage::disk('public')->putFileAs('images/moviesimages', $img, $img_name);
            $movie->movie_image()->create(['img' => $path_img]);
        }
        $movie->moviegenre()->attach($request->genre_id);
        return redirect()->route('movies.index')->with('success', 'Movie created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $countries = Country::all();
        $genres = MovieGenre::all();
        return view('dashboard.movies.edit', compact('movie', 'countries', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cast' => 'required|string',
            'trailer' => 'required|url',
            'director' => 'required|string',
            'duration' => 'required|string',
            'release_date' => 'required|date',
            'rating' => 'nullable|numeric|min:0|max:10',
            'country_id' => 'required|exists:countries,id',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre_id' => 'required|exists:movie_genres,id',
        ]);
        $movie = Movie::findOrFail($id);
        if ($request->hasFile('poster')) {
            if ($movie->poster) {
                if (Storage::disk('public')->exists($movie->poster)) {
                    Storage::disk('public')->delete($movie->poster);
                } else {
                    if (file_exists(public_path($movie->poster))) {
                        unlink(public_path($movie->poster));
                    }
                }
            }
            $poster_name = time() . "poster" . $request->file('poster')->getClientOriginalName();
            $path_poster = Storage::disk('public')->putFileAs('images/moviesposter', $request->poster, $poster_name);
            $movie->poster = $path_poster;
        }
        $movie->update([
            'title' => $request->title,
            'description' => $request->description,
            'cast' => $request->cast,
            'trailer_url' => $request->trailer,
            'director' => $request->director,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'rating' => $request->rating,
            'country_id' => $request->country_id,
        ]);
        $movie->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $img_name = time() . "image" . $img->getClientOriginalName();
                $path_img = Storage::disk('public')->putFileAs('images/moviesimages', $img, $img_name);
                $movie->movie_image()->create(['img' => $path_img]);
            }
        }
        if ($request->has('genre_id')) {
            $movie->moviegenre()->sync($request->genre_id);
        }
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $movie = Movie::find($id);
        if ($movie->poster) {
            if (Storage::disk('public')->exists($movie->poster)) {
                Storage::disk('public')->delete($movie->poster);
            } else {
                if (file_exists(public_path($movie->poster))) {
                    unlink(public_path($movie->poster));
                }
            }
        }
        if ($movie->movie_image) {
            foreach ($movie->movie_image as $image) {
                if (Storage::disk('public')->exists($image->img)) {
                    Storage::disk('public')->delete($image->img);
                } else {
                    if (file_exists(public_path($image->img))) {
                        unlink(public_path($image->img));
                    }
                }
                $image->delete();
            }
        }
        $movie->moviegenre()->detach();
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }

    public function showImages($id)
    {
        $movie = Movie::findOrFail($id);
        return view('dashboard.movies.images', compact('movie'));
    }


//client side
    public function clientIndex(Request $request)
    {
        $movies = Movie::all();

        return view('client.movies', compact('movies'));
}





    public function show($id)
    {

        $movie = Movie::with('movie_image')->findOrFail($id);

        if(!empty($movie)){
        return view('client.movie', compact('movie'));


        }else{
            abort(404);
        }
    }
}

