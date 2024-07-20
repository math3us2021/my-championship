<?php

namespace App\Repositories\Protocols;

use App\DTO\TeamDTO;
use App\Models\Team;

interface TeamRepositoryInterface
{
    public function getAll(): array;
    public function getById(string $id): ?array;
    public function create(TeamDTO $data): ?array;
}
