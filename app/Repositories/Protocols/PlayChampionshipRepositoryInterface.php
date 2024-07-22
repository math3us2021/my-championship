<?php

namespace App\Repositories\Protocols;

use App\Models\MatchesPlayed;

interface PlayChampionshipRepositoryInterface
{
    public function createMatches(array $data): ?MatchesPlayed;
}
