<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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

        View::composer(['layouts.app', 'admin.categories.index', 'livewire.create-post', 'welcome'], function($view) {
            $allCategories = \Cache::rememberForever('categories', function() {
                return Category::with('icon')->get();
            });
            $view->with('categories', $allCategories);
        });
    }
}
