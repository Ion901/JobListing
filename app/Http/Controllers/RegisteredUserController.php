<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password as RulesPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
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
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
         ]);

        $employerAttributes = $request->validate([
            'employer' => 'required',
            'logo' => ['required', File::types(['png','jpg','webp'])]
        ]);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos'); //accesam proprietatea requestului iar in cadrului campului logo din array era o instanta o biectului File, la care avem acces asupra metodaelor acestei instante. Se va salava in storage/app/public/logos
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/');

    }

}
