<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use \App\Services\ArticleService;
use \App\Services\NewsService;
use \App\Models\Article;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\NewsService', function ($app) {
            return new ArticleService(new Article());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
