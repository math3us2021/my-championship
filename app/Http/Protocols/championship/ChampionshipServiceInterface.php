<?php

namespace App\Http\Protocols\championship;


use App\DTO\ChampionshipDTO;

interface ChampionshipServiceInterface
{
    public function get(string $id = null): ?array;
    public function create(ChampionshipDTO $data): array;
    public function update(string $id, ChampionshipDTO $data): ?array;
    public function delete(string $id): ?bool;
}
