<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\HeaderComposer;
use App\Http\View\Composers\MenuBarComposer;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('common.header', HeaderComposer::class);
        View::composer('common.menubar', MenuBarComposer::class);
    }

    public function register()
    {
        //
    }
}