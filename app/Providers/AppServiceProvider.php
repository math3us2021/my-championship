<?php

namespace App\Providers;

use App\Http\Protocols\championship\ChampionshipServiceInterface;
use App\Http\Protocols\team\TeamServiceInterface;
use App\Repositories\champioship\ChampionshipRepository;
use App\Repositories\Protocols\ChampionshipRepositoryInterface;
use App\Repositories\Protocols\TeamRepositoryInterface;
use App\Repositories\team\TeamRepository;
use App\Services\championship\ChampionshipService;
use App\Services\team\TeamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeamServiceInterface::class, TeamService::class, );
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class, );
        $this->app->bind(ChampionshipServiceInterface::class, ChampionshipService::class, );
        $this->app->bind(ChampionshipRepositoryInterface::class, ChampionshipRepository::class, );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
