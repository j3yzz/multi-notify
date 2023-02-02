<?php

namespace j3yzz\MultiNotify\Providers;

use Illuminate\Support\ServiceProvider;
use j3yzz\MultiNotify\Notify;

class MultiNotifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/multi-notify.php', 'multi-notify');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind('notify', function () {
            return new Notify(config('multi-notify'));
        });
    }
}
