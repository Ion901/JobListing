<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {

        $this->validateProvider($provider);

        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse
    {

        $this->validateProvider($provider);

        $socialiteUser = Socialite::driver($provider)->user();
        $socialiteUserEmail = $socialiteUser->getEmail();

        $user = User::where('email', $socialiteUserEmail)->first();

        if ($user) {

            $user->update([
                'oauth_provider' => $provider,
                'oauth_id' => $socialiteUser->getId(),
            ]);

        } else {
            $user = User::create(
                [
                    'oauth_provider' => $provider,
                    'oauth_id' => $socialiteUser->getId(),
                    'name' => $socialiteUser->getName() ?? $socialiteUser->getNickname(),
                    'email' => $socialiteUser->getEmail(),
                    'email_verified_at' => now(),
                    'password' => Str::random(32),
                    'role' => 'employee',
                ]
            );

            event(new Registered($user));
        }


        Auth::login($user, remember: true);


        return redirect()->intended(route('home', absolute: false));
    }

    protected function validateProvider($provider)
    {
        if (! in_array($provider, ['google', 'github'])) {
            abort(404);
        }
    }
}