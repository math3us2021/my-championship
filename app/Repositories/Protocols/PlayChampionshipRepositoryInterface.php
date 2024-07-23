<?php

namespace App\Repositories\Protocols;

use App\Models\MatchesPlayed;

interface PlayChampionshipRepositoryInterface
{
    public function getAll(): array;
    public function getById(string $id): ?array;
    public function createMatches(array $data): ?bool;
    public function getPoints(int $championshipId, int $teamId): int;
    public function getChampionship(int $championshipId): array;
}
