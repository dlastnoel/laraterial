<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateLoginFormRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthenticationController extends Controller
{
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
        return Inertia::render('Auth/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthenticateLoginFormRequest $request)
    {
        if (Auth::attempt($request->validated())) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {

                return redirect()->intended(route('admin.dashboard.index'));
            }

            if (Auth::user()->role == 'user') {

                return redirect()->intended(route('user.dashboard.index'));
            }
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
}
