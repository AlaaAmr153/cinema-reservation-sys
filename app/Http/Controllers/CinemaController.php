<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function getScreens($cinemaId)
    {
        try {
            $screens = Screen::where('cinema_id', $cinemaId)->get();
            return response()->json($screens);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Could not get screens'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            "new_cinema"=>'required|string|max:100',
            'cinema_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        $img_name = time() . "cinema_img" . $request->file('cinema_img')->getClientOriginalName();
        $img_path = Storage::disk('public')->putFileAs('images/site_images/cinemas', $request->cinema_img, $img_name);
        $cinema = new Cinema();
        $cinema->cinema_name = $request->new_cinema ;
        $cinema->location = $request->location;
        $cinema->total_screens = $request->num_screen;
        $cinema->contact_number = $request->phone;
        $cinema->cinema_img = $img_path;
        $cinema->save();

        return to_route('cinemas.index')->with('message','Cinema has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

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
            'cinema_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            "num_screen"=>'required',
            "phone"=>'required|max:11',
        ]);
        $cinema=Cinema::find($id);

        if ($request->hasFile('cinema_img')) {
            if ($cinema->cinema_img) {
                if (Storage::disk('public')->exists($cinema->cinema_img)) {
                    Storage::disk('public')->delete($cinema->cinema_img);
                } else {
                    if (file_exists(public_path($cinema->cinema_img))) {
                        unlink(public_path($cinema->cinema_img));
                    }
                }
            }
            $img_name = time() . "cinema_img" . $request->file('cinema_img')->getClientOriginalName();
            $img_path = Storage::disk('public')->putFileAs('images/site_images/cinemas', $request->cinema_img, $img_name);
            $cinema->cinema_img = $img_path;
        }

        $cinema->update([
            'cinema_name'=> $request->new_cinema,
            'location'=> $request->location,
            'cinema_img'=> $request->cinema_img,
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


    public function cinemaindex(Request $request){

        $cinemas = Cinema::with('screen.showtime')->get();
        return view('client.cinemas', compact('cinemas'));
    }


}


