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
        $validated = $request->validated();

        $role = $validated['role'] === 'vacancy' ? 'employer' : 'employee';

        $user = User::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $role,
        ]);

        if ($role === 'employer') {

            $logoPath = $request->file('logo')->store('logos'); //accesam proprietatea requestului iar in cadrului campului logo din array era o instanta o biectului File, la care avem acces asupra metodaelor acestei instante. Se va salava in storage/app/public/logos7

            $user->employer()->create([
                'email' => $request->validated('employer'),
                'logo' => $logoPath, //stergem logos/ din path imaginii
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect('/');
    }
}
