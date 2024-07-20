<?php

namespace App\Http\Protocols\team;

use App\DTO\TeamDTO;

interface TeamServiceInterface
{
    public function get(string $id = null): array;
    public function create(TeamDTO $data): array;
    public function update(string $id, TeamDTO $data): array;
//    public function delete(string $id): array;
}
