<?php

namespace App\Providers;

use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share the authenticated user with all views
        View::composer('layouts.app', function ($view) {
            $pageTitle = (Auth::user()) ? Entity::find(Auth::user()->preferred_entity_id)->title : null;
            $view->with('pageTitle', $pageTitle.' '.config('app.name'));
        });
    }
}
