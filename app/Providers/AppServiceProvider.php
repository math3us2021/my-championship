<?php

namespace App\Providers;

use App\Http\Protocols\teams\TeamsInterface;
use App\Repositories\Protocols\TeamsRepositoryInterface;
use App\Repositories\Teams\TeamsRepository;
use App\Services\teams\TeamsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
