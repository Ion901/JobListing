<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Policies\JobPolicy;
use App\Policies\EmployerPolicy;
use App\Policies\UserPolicy;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

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

        Gate::before(function ($user, $ability) {
            if ($user->role === 'admin') return true;
        });

        Gate::policy(Job::class, JobPolicy::class);
        Gate::policy(Employer::class, EmployerPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
