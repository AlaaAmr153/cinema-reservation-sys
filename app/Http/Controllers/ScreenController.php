<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;

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
        return view('dashboard.screens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'screen_code'=>"required|string",
            'seat_capacity'=>"required|integer",
            'screen_type'=>"required|string|max:255",
            'cinema_id'=>"required|integer",
            'under_maintainance'=>"required|boolean"
        ]);

        $screen = new Screen();
        $screen->screen_code = $request->screen_code;
        $screen->seat_capacity = $request->seat_capacity;
        $screen->screen_type = $request->screen_type;
        $screen->cinema_id = $request->cinema_id;
        $screen->under_maintainance = $request->under_maintainance;
        $screen->save();

        return to_route('screens.index');


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $screen = Screen::findOrFail($id);

        return view('dashboard.screens.edit',['screen' => $screen]);
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
            'cinema_id'=>"required|integer",
            'under_maintainance'=>"required|boolean"
        ]);

        $screen = Screen::findOrFail($id);


        $screen->screen_code = $request->screen_code;
        $screen->seat_capacity = $request->seat_capacity;
        $screen->screen_type = $request->screen_type;
        $screen->cinema_id = $request->cinema_id;
        $screen->under_maintainance = $request->under_maintainance;
        $screen->save();

        return to_route('screens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Screen::destroy($id);

        return to_route('screens.index');
    }
}
