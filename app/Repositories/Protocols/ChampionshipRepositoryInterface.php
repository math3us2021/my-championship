<?php

namespace App\Repositories\Protocols;

use App\DTO\ChampionshipDTO;


interface ChampionshipRepositoryInterface
{
    public function getAll(): array;
    public function getById(string $id): ?array;
    public function create(ChampionshipDTO $data): ?array;
    public function update(string $id, ChampionshipDTO $data): ?array;
    public function delete(string $id): ?bool;
}
