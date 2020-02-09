<?php

namespace App\Providers;

use App\Link;
use App\Repositories\EloquentRepository;
use App\Repositories\LinkRepository;
use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LinkRepository::class, function ($app) {
            return new LinkRepository(
                new EloquentRepository(new Link)
            );
        });
    }
}
