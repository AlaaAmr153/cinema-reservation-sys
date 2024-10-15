<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.contact');
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
        {
            $request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'feedback'=>'required|string',
            ]);
            try{
                Feedback::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'feedback'=>$request->feedback,
                    'user_id' => Auth::id(),
                ]);

                return redirect()->back()->with('success', 'Thank you for your feedback');

            }catch(\Exception $e){
                Log::error($e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
