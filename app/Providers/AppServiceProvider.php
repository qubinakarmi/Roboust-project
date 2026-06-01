<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\View\Composers\SettingComposer;
use App\Http\View\Composers\ServiceComposer;
use App\Http\View\Composers\CertificateComposer;
use App\Http\View\Composers\ContactComposer;
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

        View::composer('*', SettingComposer::class);
        View::composer('*', ServiceComposer::class);
        View::composer('*', CertificateComposer::class);
       View::composer('*', ContactComposer::class);


    }
}
