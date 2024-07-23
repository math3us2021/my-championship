<?php

namespace App\Repositories\playchampionship;

use App\Models\Championship;
use App\Models\MatchesPlayed;
use App\Repositories\Protocols\PlayChampionshipRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PlayChampionshipRepository implements PlayChampionshipRepositoryInterface
{
    public function getAll(): array
    {
        return MatchesPlayed::all()->toArray();
    }

    public function getById(string $id): ?array
    {
        $team = DB::table('matches_played')->where('championship_id', $id)->get();
        return $team?->toArray();
    }

    public function createMatches(array $data): ?bool
    {
        return DB::table('matches_played')->insert($data);
//        return MatchesPlayed::created($data);
    }

    public function getPoints(int $championshipId, int $teamId): int
    {
        return DB::table('matches_played')
            ->where('championship_id', $championshipId)
            ->where(function($query) use ($teamId) {
                $query->where('team1_id', $teamId)
                    ->orWhere('team2_id', $teamId);
            })
            ->select(DB::raw("
            SUM(
                CASE
                    WHEN team1_id = $teamId THEN team1_points
                    WHEN team2_id = $teamId THEN team2_points
                    ELSE 0
                END
            ) as total_points
        "))
            ->value('total_points');
    }

    public function getChampionship(int $championshipId): array
    {
        return DB::table('matches_played')
            ->where('championship_id', $championshipId)
            ->get()->toArray();
    }
}
