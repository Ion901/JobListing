<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale(config('app.locale'));

        Password::defaults(static function (): Password {
           $rule = Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();

            return app()->isProduction() ? $rule->uncompromised() : $rule;
        });


    }
}
