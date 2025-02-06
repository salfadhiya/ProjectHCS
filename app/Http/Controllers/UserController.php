<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view("home.user.index", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.user.tambah", );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        user::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            'role'=> $request->role,
        ]);

        return redirect('/user')->with('success', 'Admin Berhasil Ditambahkan!');
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
        $user= User::find($id);
        return view("home.user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user= User::find($id);
        $user->update($request->all());
        return redirect('/user')->with("success","Data Admin Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect("/user")->with("success","Data berhasil dihapus");
    }
}
