<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::extend('garmin-connect', function ($app, $name, array $config) {
            return new YourGarminConnectGuard(
                Auth::createUserProvider($config['provider']),
                $app->make('request')
            );
        });
         
        $this->registerPolicies();

        //
    }
}
