<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{

            $admins_search = User::role(['admin', 'super_admin']);

            if ($request->search) $admins_search->whereHas('roles', function($search) use ($request){
                $search->where('name', 'like', '%' . $request->search . '%');})
                ->orWhereHas('permissions', function($search) use ($request){
                $search->where('name', 'like', '%' . $request->search . '%');});


            $admins = $admins_search->select('users.*')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(10);;


        return view('dashboard.admin.index', [
            'admins_search' => $admins_search->get(),
            'admins' => $admins
        ]);

        }catch(\Exception $exception){
            return to_route('admins.index')->with('message',$exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            $admins = User::all();
            $roles = Role::all();
            $permissions = Permission::all();
            return view('dashboard.admin.create')
            ->with(compact('admins'))
            ->with(compact('roles'))
            ->with(compact('permissions'));

    }catch(\Exception $exception){
    return to_route('admins.index')->with('message',$exception->getMessage());
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|string'
        ]);
        try{
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => '123456789',
            ])->assignRole('admin');

            return to_route('admins.create')->with('message','admin has been created');

        }catch(\Exception $exception){
            return to_route('admins.create')->with('message',$exception->getMessage());
        }
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


    public  function adminIndex(){
        try{

            $admins = User::all();
            return view('dashboard.admin.index')->with(compact('admins'));

        }catch(\Exception $exception){

        }
    }
}
