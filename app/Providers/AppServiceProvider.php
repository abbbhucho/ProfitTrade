<?php

namespace App\Providers;
use App\Observers\UserObserver;
use App\Observers\ActivitieObserver;
use Illuminate\Support\ServiceProvider;
use Schema;
use App\Stock_detail;
use App\User;
use App\Activitie;
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
        Schema::defaultStringLength(191);
        Stock_detail::observe(ActivitieObserver::class);
        User::observe(UserObserver::class);
    }
}
