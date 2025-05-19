<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cookie;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
         $this->registerPolicies();

    Event::listen(Login::class, function ($event) {
        if (request()->has('remember')) {
            Cookie::queue('remember_web_' . $event->user->getAuthIdentifier(), null, 1440); // 1 day = 1440 min
        }
    });
    }
}
