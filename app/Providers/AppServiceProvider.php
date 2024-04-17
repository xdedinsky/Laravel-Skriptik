<?php

namespace App\Providers;

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
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $points = \DB::table('list_tasks_done')
                            ->where('user_id', auth()->user()->id)
                            ->sum('points');
                $view->with('userPoints', $points);
            }
        });
    }
}
