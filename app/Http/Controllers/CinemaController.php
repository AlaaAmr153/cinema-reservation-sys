<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cinemas = Cinema::Paginate(10);
        return view('dashboard.cinemas.index', compact('cinemas'));
        
        // $search = $request->input('search');
        // $srch_cinema= Cinema::when($search , function($query) use ($search){
        //     return $query->where('cinema_name', 'LIKE' , "%{$search}%");
        // // })->get();
        // dd($search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cinemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            "new_cinema"=>'required|string|max:100',
            "location"=>'required|string',
            "num_screen"=>'required',
            "phone"=>'required|max:11',
        ]
        ,[
            'new_cinema.required'=>"Name of cinema is required",
            'location'=>"Location is required",
            'num_screen'=>"Number of screen is required",
            'phone'=>"Max Number is 11",
        ]);
        $cinema = new Cinema();
        $cinema->cinema_name = $request->new_cinema ;
        $cinema->location = $request->location;
        $cinema->total_screens = $request->num_screen;
        $cinema->contact_number = $request->phone;
        $cinema->save();
        return to_route('cinemas.index')->with('message','Cinema has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cinema $cinema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $cinema = Cinema::find($id);
        return view('dashboard.cinemas.edit',compact('cinema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "new_cinema"=>'required|string|max:100',
            "location"=>'required|string',
            "num_screen"=>'required',
            "phone"=>'required|max:11',
        ]);
        $cinema=Cinema::find($id);
        $cinema->update([
            'cinema_name'=> $request->new_cinema,
            'location'=> $request->location,
            'total_screens'=> $request->num_screen,
            'contact_number'=> $request->phone,
        ]);
        $cinema->save();
        return to_route('cinemas.index')->with('message','Cinema has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Cinema::destroy($id);
        // $cinema->delete();
        return to_route('cinemas.index')->with('message','Cinema has been deleted');
    }
}
