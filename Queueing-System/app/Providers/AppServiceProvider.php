<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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

        Validator::extend('at_least_one_selected', function ($attribute, $value, $parameters, $validator) {
            $selectedFields = collect([
                $validator->getData()['auto_increment'],
                $validator->getData()['prefix'],
                $validator->getData()['surfix'],
                $validator->getData()['reset_daily'],
            ])->filter()->count();

            return $selectedFields > 0;
        }, 'Bạn phải chọn ít nhất một trường!');
    }

    public function register()
    {
        //
    }
}