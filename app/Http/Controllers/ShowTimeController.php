<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.showtime.index');
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
    public function show(ShowTime $showTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowTime $showTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowTime $showTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowTime $showTime)
    {
        //
    }
}
