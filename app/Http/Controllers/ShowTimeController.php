<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Laravel\Prompts\select;

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
            ->orderBy('created_at', 'desc')->paginate(10));

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
                $screens =[];

                if ($request->has('cinema_id')) {
                    // Filter screens based on the selected cinema
                    $screens = Screen::where('cinema_id', $request->cinema_id)->select('screens.screen_code');
                    dd($screens);
                }
                return view('dashboard.showtime.create')
                ->with(compact('movies'))
                ->with(compact('screens'))
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
            'date'=>'required',
            'time'=>'required'
        ]);
        try{
            ShowTime::create([
                'movie_id'=>$request->movie_id,
                'screen_id'=>$request->screen_id,
                'show_date'=>$request->date,
                'show_time'=>$request->time,
            ]);

            return to_route('showtimes.index')->with('message','showtime has been created');

        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
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
    public function edit(string $id,Request $request)
    {
        try{
            $showtime = ShowTime::findOrFail($id);
            $movies = Movie::all();
            $cinemas= Cinema::all();
            $screens =[];

            if ($request->has('cinema_id')) {
                // Filter screens based on the selected cinema
                $screens = Screen::where('cinema_id', $request->cinema_id)->select('screens.screen_code');
                dd($screens);}

            return view('dashboard.showtime.edit')
            ->with(compact('showtime'))
            ->with(compact('movies'))
            ->with(compact('screens'))
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
            'date'=>'required',
            'time'=>'required']);
        try{
            $showtime = ShowTime::findOrFail($id);
            $showtime->update([
                'movie_id'=>$request->movie_id,
                'screen_id'=>$request->screen_id,
                'show_date'=>$request->date,
                'show_time'=>$request->time,
            ]);
;
            return to_route('showtimes.index')->with('message','showtime has been updated');
        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
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
}
