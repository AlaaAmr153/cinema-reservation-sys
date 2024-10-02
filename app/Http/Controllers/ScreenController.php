<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;
use App\Models\Cinema;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screens = Screen::with('cinema')->get();

        return view('dashboard.screens.index',compact('screens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cinemas = Cinema::all();
        return view('dashboard.screens.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'screen_code'=>"required|string",
            'seat_capacity'=>"required|integer|max:1000",
            'screen_type'=>"required|string|max:255",
            'cinema_id'=>"required|exists:cinemas,id",
            'under_maintainance'=>"nullable|boolean"
        ], [
            'cinema_id.required' => 'Please select a cinema from the dropdown.',
            'screen_code.required' => 'The screen code is required.',
            'seat_capacity.required' => 'Please provide the seat capacity.',
            'seat_capacity.integer' => 'Seat capacity must be a number.',
        ]);

        $under_maintenance = $request->has('under_maintenance') ? 1 : 0;
        $screen = new Screen();
        $screen->screen_code = $request->screen_code;
        $screen->seat_capacity = $request->seat_capacity;
        $screen->screen_type = $request->screen_type;
        $screen->cinema_id = $request->cinema_id;
        $screen->under_maintainance = $under_maintenance;
        $screen->save();

        return to_route('screens.index')->with('message','Screen has been Added');


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $screen = Screen::findOrFail($id);

        $cinemas = Cinema::all();

        return view('dashboard.screens.edit',compact('screen', 'cinemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'screen_code'=>"required|string",
            'seat_capacity'=>"required|integer",
            'screen_type'=>"required|string|max:255",
            'cinema_id'=>"required|exists:cinemas,id",
            'under_maintainance'=>"nullable|boolean"
        ], [
            'cinema_id.required' => 'Please select a cinema from the dropdown.',
            'screen_code.required' => 'The screen code is required.',
            'seat_capacity.required' => 'Please provide the seat capacity.',
            'seat_capacity.integer' => 'Seat capacity must be a number.',
        ]);

        $screen = Screen::findOrFail($id);
        $under_maintenance = $request->has('under_maintenance') ? 1 : 0;


        $screen->screen_code = $request->screen_code;
        $screen->seat_capacity = $request->seat_capacity;
        $screen->screen_type = $request->screen_type;
        $screen->cinema_id = $request->cinema_id;
        $screen->under_maintainance = $under_maintenance;
        $screen->save();

        return to_route('screens.index')->with('message','Screen has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Screen::destroy($id);

        return to_route('screens.index')->with('message','Screen has been deleted');
    }
}
