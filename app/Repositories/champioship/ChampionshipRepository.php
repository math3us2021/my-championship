<?php

namespace App\Repositories\champioship;


use App\DTO\ChampionshipDTO;
use App\Models\Championship;
use App\Repositories\Protocols\ChampionshipRepositoryInterface;

class ChampionshipRepository implements ChampionshipRepositoryInterface
{
    public function getAll(): array
    {
        return Championship::all()->toArray();
    }

    public function getById(string $id): ?array
    {
        $team = Championship::find($id);
        return $team ? $team->toArray() : null;
    }

    public function create(ChampionshipDTO $data): ?array
    {
        $team = Championship::create(['name' => $data->name]);
        return $team ? $team->toArray() : null;
    }

    public function update(string $id, ChampionshipDTO $data): ?array
    {
        $team = Championship::find($id);
        if (!$team) return null;
        $team->update(['name' => $data->name]);
        return $team ? $team->toArray() : null;
    }


    public function delete(string $id): ?bool
    {
        $team = Championship::find($id);
        if (!$team) return null;
        return $team ? $team->delete() : false;
    }
}
