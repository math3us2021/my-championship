<?php

namespace App\Services\playchampionship;

use App\DTO\playChampionshipDTO;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;


class PlayChampionshipService implements PlayChampionshipServiceInterface
{
    public function create(playChampionshipDTO $data): array
    {
        return [];
    }
}
