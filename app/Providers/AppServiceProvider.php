<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    private $imageModel;
    public function __construct()
    {
        $this->imageModel = 'App\Models\ImgUpload';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();
        
        Blade::component('components.backend-breadcrumbs', 'backendBreadcrumbs');

        //share data to all view
        $images = $this->imageModel::select('image')->get();
        
        view()->share('images', $images);

    }
}
