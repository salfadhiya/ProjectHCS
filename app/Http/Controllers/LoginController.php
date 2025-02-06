<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function showLogin()
    {
        if (Auth::check()){
            return redirect('/');
        } else {
            return view('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)){
            return redirect('/')->with('success', 'Login Telah Berhasil');
        } else {
            return redirect ('/login')->with('error',  'Invalid email or password');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Logout()
    {
        Auth::logout();
        return  redirect('/login')->with('success', 'Bye!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
}
