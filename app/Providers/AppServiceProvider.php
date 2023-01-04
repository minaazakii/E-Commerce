<?php

namespace App\Providers;

use App\Models\Setting;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::firstOr(function () {
            if(!app()->runningInConsole())
            {
                Setting::Create(
                    [
                        'name'=>'E_commerc',
                        'description'=>"Hello",
                    ]
                );
            }
        });
        view()->share('setting', $setting);
    }
}
