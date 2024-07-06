<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Policies\StudentPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    

    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('view-student', [StudentPolicy::class, 'view']);
        
        // $this->gate('view', [StudentPolicy::class, 'view']);
        // Gate::define('update-student', [StudentPolicy::class, 'update']);
        
    }
}
