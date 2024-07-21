<?php

namespace App\Http\Protocols\playchampioship;



use App\DTO\playChampionshipDTO;

interface PlayChampionshipServiceInterface
{
    public function create(playChampionshipDTO $data): array;
}
