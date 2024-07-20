<?php

namespace App\Repositories\team;


use App\Models\Team;
use App\Repositories\Protocols\TeamRepositoryInterface;

class TeamRepository implements TeamRepositoryInterface
{
    public function getAll(): array
    {
        return Team::all()->toArray();
    }

    public function getById(string $id): ?array
    {
        $team = Team::find($id);
        return $team ? $team->toArray() : null;
    }

    public function create(string $name): ?array
    {
        $team = Team::create(['name' => $name]);
        return $team ? $team->toArray() : null;
    }
}
