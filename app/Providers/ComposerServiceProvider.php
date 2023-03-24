<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            // Set Directions Variables
            $view->with('dir', app()->getLocale() == 'ar' ? 'rtl' : 'ltr');
            $view->with('dirClass', app()->getLocale() == 'ar' ? 'right' : 'left');
            $view->with('dirCss', app()->getLocale() == 'ar' ? '.rtl' : '');

            App::singleton('general_settings', function(){
                return Setting::whereType('general')->get()->groupBy('unique_key');
            });

            $view->with('general_settings',app('general_settings') );
        });
    }
}
