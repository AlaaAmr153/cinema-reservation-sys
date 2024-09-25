<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // try{
        //     $showtimes=ShowTime::query();

        // }catch(\Exception $exception){
        return view('dashboard.showtime.index');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // try{

        // }catch(\Exception $exception){
        return view('dashboard.showtime.create');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

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
    public function edit(ShowTime $showTime)
    {
        try{

        }catch(\Exception $exception){
            return to_route('showtimes.index')->with('message',$exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowTime $showTime)
    {
        try{

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
