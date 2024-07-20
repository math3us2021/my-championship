<?php

namespace App\Services\team;

use App\Http\Protocols\team\TeamServiceInterface;
use App\Repositories\Protocols\TeamRepositoryInterface;

class TeamService implements TeamServiceInterface
{
    protected TeamRepositoryInterface $teamRepository;
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function get(string $id = null): array
    {
        if ($id) {
            $team = $this->teamRepository->getById($id);
            return $team ? [$team] : [];
        }

        return $this->teamRepository->getAll();
    }


    public function store(string $name): array
    {
        return $this->teamRepository->create($name);
    }
}
