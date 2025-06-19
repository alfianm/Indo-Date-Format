<?php

namespace Alfian\IndoDateFormat;

use Illuminate\Support\ServiceProvider;

class IndoDateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Tidak ada proses publish saat ini
    }

    public function register()
    {
        $this->app->singleton('indoDate', function () {
            return new IndoDate();
        });
    }
}
