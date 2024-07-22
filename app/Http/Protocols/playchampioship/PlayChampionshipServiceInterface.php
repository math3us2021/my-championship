<?php

namespace App\Http\Protocols\playchampioship;



use App\DTO\PlayChampionshipDTO;

interface PlayChampionshipServiceInterface
{
    public function create(PlayChampionshipDTO $data): array;
}
