<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SessionInstance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;


class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionInstance $request)
    {

        $attributes = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password')
        ];

        $remember_me = $request->validated('remember_me');


        if (!Auth::attempt($attributes, $remember_me)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, these credentials do not match'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }


    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}