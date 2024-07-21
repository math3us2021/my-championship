<?php

namespace App\Services\championship;

use App\Http\Protocols\championship\ChampionshipServiceInterface;
use App\Repositories\Protocols\ChampionshipRepositoryInterface;
use App\DTO\ChampionshipDTO;


class ChampionshipService implements ChampionshipServiceInterface
{
    protected ChampionshipRepositoryInterface $teamRepository;
    public function __construct(ChampionshipRepositoryInterface $teamRepository)
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


    public function create(ChampionshipDTO $data): array
    {
        return $this->teamRepository->create($data);
    }

    public function update(string $id, ChampionshipDTO $data): ?array
    {
        return $this->teamRepository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->teamRepository->delete($id);
    }
}
