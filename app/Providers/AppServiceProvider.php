<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use MailchimpMarketing\ApiClient;
use App\Models\User;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function(User $user){
            return $user->isAdmin == 1 && $user->verified;
        });

        Gate::define('superAdmin', function(User $user){
            return $user->isSuperAdmin === 1 && $user->verified;
        });
        Gate::define('user', function(User $user){
            return $user->isAdmin === 0 && $user->verified;
        });

        Blade::if('admin', function () {
            return request()->user()->can('admin');
        });
        Blade::if('superAdmin', function () {
            return request()->user()->can('superAdmin');
        });
        Blade::if('user', function(){
            return request()->user()->can('user');
        });
    }


}
