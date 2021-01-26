<?php

namespace Mbf\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Mbf\Modules\Contracts\RepositoryInterface;
use Mbf\Modules\Laravel\LaravelFileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, LaravelFileRepository::class);
    }
}
