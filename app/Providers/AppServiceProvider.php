<?php

namespace App\Providers;

use App\Http\Protocols\team\TeamServiceInterface;
use App\Repositories\Protocols\TeamRepositoryInterface;
use App\Repositories\team\TeamRepository;
use App\Services\team\TeamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(TeamServiceInterface::class, TeamService::class, );
        $this->app->register(TeamRepositoryInterface::class, TeamRepository::class, );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
