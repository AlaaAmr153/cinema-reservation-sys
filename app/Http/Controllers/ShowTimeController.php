<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $showtimes=ShowTime::query();

            if ($request->search) $showtimes->whereHas('movie', function($search) use ($request){
                $search->where('title', 'like', '%' . $request->search . '%');})
                ->orWhereHas('screen', function($search) use ($request){
                $search->where('screen_code', 'like', '%' . $request->search . '%');})
                ->orWhere('show_date', 'like', '%' . $request->search . '%')
                ->orWhere('show_time', 'like', '%' . $request->search . '%');

            return view('dashboard.showtime.index')->with('showtimes',$showtimes->select('show_times.*')
            ->orderBy('created_at', 'desc')->paginate(5));

        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{

                $movies = Movie::all();
                $cinemas= Cinema::all();
                return view('dashboard.showtime.create')
                ->with(compact('movies'))
                ->with(compact('cinemas'));

        }catch(\Exception $exception){
        return to_route('showtimes.index')->with('message',$exception->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id'=>'required|exists:movies,id',
            'screen_id'=>'required|exists:screens,id',
            'cinema_id'=>'required|exists:cinemas,id',
            'date'=>'required',
            'time'=>'required'
        ]);
        try{
            ShowTime::create([
                'movie_id'=>$request->movie_id,
                'screen_id'=>$request->screen_id,
                'cinema_id'=>$request->cinema_id,
                'show_date'=>$request->date,
                'show_time'=>$request->time,
            ]);

            return to_route('showtimes.index')->with('message','showtime has been created');

        }catch(\Exception $exception){
            return to_route('showtimes.create')->with('message',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowTime $showTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $showtime = ShowTime::findOrFail($id);
            $movies = Movie::all();
            $cinemas= Cinema::all();

            return view('dashboard.showtime.edit')
            ->with(compact('showtime'))
            ->with(compact('movies'))
            ->with(compact('cinemas'));

        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'movie_id'=>'required|exists:movies,id',
            'screen_id'=>'required|exists:screens,id',
            'cinema_id' => 'required|exists:cinemas,id',
            'date'=>'required',
            'time'=>'required'
        ]);
        try{
            $showtime = ShowTime::findOrFail($id);
            $showtime->update([
                'movie_id'=>$request->movie_id,
                'screen_id'=>$request->screen_id,
                'cinema_id' => $request->cinema_id,
                'show_date'=>$request->date,
                'show_time'=>$request->time,
            ]);
;
            return to_route('showtimes.index')->with('message','showtime has been updated');
        }catch(\Exception $exception){
            return to_route('showtimes.edit')->with('message',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            ShowTime::destroy($id);
            return to_route('showtimes.index')->with('message','showtime has been deleted');

        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
        }
    }


    //client side functions

    // public function display_showtime(Request $request){

    //     $selectedCinemaId = $request->input('cinema_id');
    //     $selectedMovieId = $request->input('movie_id', 1);

    //     $cinemas = Cinema::with(['screen.showtime'])->get();

    //     $selectedCinema = Cinema::with(['screen.showtime' => function ($query) use ($selectedMovieId) {
    //         $query->where('movie_id', $selectedMovieId);
    //     }])->findOrFail($selectedCinemaId);

    //     $selectedMovie = Movie::findOrFail($selectedMovieId);
    //     $movies = Movie::all();

    //     return view('client.showtime', compact('cinemas', 'selectedCinema', 'selectedMovie', 'selectedMovieId','movies'));

    // }


    public function display_showtime(Request $request)
{
    $selectedCinemaId = $request->input('cinema_id');
    $selectedMovieId = $request->input('movie_id', 1);

    // fetch cinemas and their related screens and showtimes
    $cinemas = Cinema::with(['screen.showtime'])->get();  //cinema doesnt have a direct relation with the showtime

    // fetch the selected cinema and its related data
    $selectedCinema = $selectedCinemaId ? Cinema::with(['screen.showtime' => function ($query) use ($selectedMovieId) {
        $query->where('movie_id', $selectedMovieId); // only get showtimes for the selected movie
    }])->findOrFail($selectedCinemaId) : null;

    // get movies that have showtimes for the selected cinema
    // $movies = ShowTime::whereHas('movie', function($query) use ($selectedCinemaId) {
    //     $query->whereIn('screen_id', function($subQuery) use ($selectedCinemaId) {
    //         $subQuery->select('id')->from('screens')->where('cinema_id', $selectedCinemaId);
    //     });
    // })->get();
    $movies = Movie::all();

    $selectedMovie = $selectedMovieId ? Movie::findOrFail($selectedMovieId) : null;
    return view('client.showtime', compact('cinemas', 'selectedCinema', 'selectedMovie', 'selectedMovieId', 'movies'));
}


}






