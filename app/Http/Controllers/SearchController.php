<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // try{

        //     $searchmovie = Movie::query();
        //     if($request->search)
        //             {
        //                 $searchmovie->where('title','like','%'.$request->search.'%');
        //             }
        //     $movies = $searchmovie->get();

        //     $searchcinema = Cinema::query();
        //     if($request->search)
        //             {
        //                 $searchcinema->where('cinema_name','like','%'.$request->search.'%');
        //             }
        //     $cinemas = $searchcinema->get();

        //     return view('client.search',compact('searchmovie','searchcinema'));

        // }catch(\Exception $exception){

        try {
            $searchTerm = $request->search;
            $movies = [];
            $cinemas = [];

            if ($searchTerm) {
                $movies = Movie::where('title', 'like', '%' . $searchTerm . '%')->get();
                $cinemas = Cinema::where('cinema_name', 'like', '%' . $searchTerm . '%')->get();
            }

            return view('client.search', compact('movies', 'cinemas', 'searchTerm'));
        } catch (\Exception $exception) {
            // Handle the exception (e.g., log it, show an error message)
        }

        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
