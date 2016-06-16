<?php

namespace AbelHalo\Titles;

use AbelHalo\Titles\Repository\Manager;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @noinspection PhpUndefinedClassInspection */
        \Blade::directive('title', function ($expression) {
            return "<?=e(Titles::render{$expression});?>";
        });

        /** @noinspection PhpIncludeInspection */
        require app_path('Http/titles.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('titles', Manager::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['titles'];
    }
}
