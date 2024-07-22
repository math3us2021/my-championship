<?php

namespace App\Repositories\playchampionship;

use App\Models\MatchesPlayed;
use App\Repositories\Protocols\PlayChampionshipRepositoryInterface;

class PlayChampionshipRepository implements PlayChampionshipRepositoryInterface
{

    public function createMatches(array $data): ?MatchesPlayed
    {
        dd($data);
        $red=  MatchesPlayed::create($data);
        dd($red);
    }
}
