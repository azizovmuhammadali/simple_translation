<?php

namespace App\Providers;

use App\Interfaces\Reposity\BookReposityInterface;
use App\Interfaces\Services\BookServiceInterface;
use App\Reposities\BookReposity;
use App\Services\BookService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvicer extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BookReposityInterface::class,BookReposity::class);
        $this->app->bind(BookServiceInterface::class, BookService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
