<?php

namespace App\Providers;

use App\ChargeCommision;
use App\Silder;
use App\General;
use App\Menu;
use App\News;
use App\Social;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $general = General::find(1);
        $charge = ChargeCommision::find(1);
        $menu = Menu::all();
        $social = Social::all();
        $silder = Silder::find(19);
        $news_latest = News::orderBy('id', 'desc')->take(8)->get();
        View::share(compact( 'general','menu', 'social', 'charge','news_latest', 'silder'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
