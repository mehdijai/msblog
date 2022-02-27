<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\View\Components\MailTemplate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Blade::component('package-alert', MailTemplate::class);
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        Paginator::defaultView('livewire.components.paginations');
    }
}
