<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
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
    public function store(RegisterUserRequest $request)
    {

        $user = User::create([
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
            'role' => $request->validated('role')
        ]);

        if ($request->input('role') === 'vacancy') {
            $employerAttributes = $request->validated(['employer','logo']);

            $logoPath = $request->logo->store('logos'); //accesam proprietatea requestului iar in cadrului campului logo din array era o instanta o biectului File, la care avem acces asupra metodaelor acestei instante. Se va salava in storage/app/public/logos7

            $user->employer()->create([
                'name' => $employerAttributes['employer'],
                'logo' => substr($logoPath, 6), //stergem logos/ din path imaginii
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect('/');
    }
}