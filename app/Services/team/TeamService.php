<?php

namespace App\Services\team;

use App\DTO\TeamDTO;
use App\Http\Protocols\team\TeamServiceInterface;
use App\Repositories\Protocols\TeamRepositoryInterface;

class TeamService implements TeamServiceInterface
{
    protected TeamRepositoryInterface $teamRepository;
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function get(string $id = null): ?array
    {
        if ($id) {
            return $this->teamRepository->getById($id);
        }

        return $this->teamRepository->getAll();
    }


    public function create(TeamDTO $data): array
    {
        return $this->teamRepository->create($data);
    }

    public function update(string $id, TeamDTO $data): ?array
    {
        return $this->teamRepository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->teamRepository->delete($id);
    }
}
