<?php

namespace Mbf5923\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Mbf5923\Modules\Contracts\RepositoryInterface;
use Mbf5923\Modules\Laravel\LaravelFileRepository;

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
