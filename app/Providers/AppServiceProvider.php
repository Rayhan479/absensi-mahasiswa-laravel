<?php

namespace App\Providers;

use App\View\Components\AdminLayout;
use App\View\Components\AppLayout;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('admin-layout', AdminLayout::class);
        Blade::component('mahasiswa-layout', AppLayout::class);
    }
}
