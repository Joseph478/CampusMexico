<?php

namespace App\Providers;

use App\Course;
use App\TestUser;
use App\Classroom;
use App\Assistance;
use App\Inscription;
use App\Observers\CourseObserver;
use App\Observers\TestUserObserver;
use App\Observers\ClassroomObserver;
use App\Observers\AssistanceObserver;
use App\Observers\InscriptionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Course::observe(CourseObserver::class);
        Classroom::observe(ClassroomObserver::class);
        Inscription::observe(InscriptionObserver::class);
        Assistance::observe(AssistanceObserver::class);
        TestUser::observe(TestUserObserver::class);
    }
}
