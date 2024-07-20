<?php

namespace App\Repositories\team;


use App\DTO\TeamDTO;
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

    public function create(TeamDTO $data): ?array
    {
        $team = Team::create(['name' => $data->name]);
        return $team ? $team->toArray() : null;
    }

    public function update(string $id, TeamDTO $data): ?array
    {
        $team = Team::find($id);
        $team->update(['name' => $data->name]);
        return $team ? $team->toArray() : null;
    }
}
