<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

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

        $this->registerPolicies();
        
        Paginator::useBootstrap();
        
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
         });
        
         /* define a teacher user role */
         Gate::define('isTeacher', function($user) {
             return $user->role == 'teacher';
         });
       
         /* define a cahiser role */
         Gate::define('isCashier', function($user) {
             return $user->role == 'cashier';
         });

         /* define a guidance role */
         Gate::define('isGuidance', function($user) {
            return $user->role == 'guidance';
        });

        /* define a student role */
        Gate::define('isStudent', function($user) {
            return $user->role == 'student';
        });
    }
}
