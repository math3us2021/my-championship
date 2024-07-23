<?php

namespace App\Services\playchampionship;

use App\DTO\PlayChampionshipDTO;
use App\Helpers\ChampionshipDraw;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;
use App\Repositories\Protocols\PlayChampionshipRepositoryInterface;


class PlayChampionshipService implements PlayChampionshipServiceInterface
{
    protected PlayChampionshipRepositoryInterface $playChampionshipRepository;

    public function __construct(PlayChampionshipRepositoryInterface $playChampionshipRepository)
    {
        $this->playChampionshipRepository = $playChampionshipRepository;
    }

    public function create(PlayChampionshipDTO $data): array
    {
        $shuffleTeams = new ChampionshipDraw();
        $quarterfinals = $shuffleTeams->handle($data->teams);
        $semifinals = $shuffleTeams->selectWinners($quarterfinals);
        $this->saveMatches($quarterfinals, intval($data->championshipId), 'quartas de final', $semifinals);

        $semifinalsGame = $shuffleTeams->handle($semifinals);
        $final = $shuffleTeams->selectWinners($semifinalsGame);
        $this->saveMatches($semifinalsGame, intval($data->championshipId), 'semifinais', $final);

        $finalGames = $shuffleTeams->handle($final, true);
        $champion = $this->verifyAtie($finalGames, $data, $shuffleTeams);
        $this->saveMatches($finalGames, intval($data->championshipId), 'final', $champion);

//        dd($semifinals, $final, $finalGames, $champion);

        $getCampeonato = $this->playChampionshipRepository->getChampionship($data->championshipId);
//        dd($getCampeonato);
        return [
            'championship_id' => $data->championshipId,
            'team_winner' => $champion,
            'championship_matches' => $getCampeonato,
        ];
    }

    private function verifyAtie(array $result, PlayChampionshipDTO $data, ChampionshipDraw $shuffleTeams)
    {
        $team1 = $result[0]['team1_score'];
        $team2 = $result[0]['team2_score'];
        if ($team1 == $team2) {

            $team1Points = $this->playChampionshipRepository->getPoints($data->championshipId, $result[0]['team1']);
            $team2Points = $this->playChampionshipRepository->getPoints($data->championshipId, $result[0]['team2']);

            if ($team1Points > $team2Points) {
                return [$result[0]['team1']];
            } elseif ($team2Points > $team1Points) {
                return [$result[0]['team2']];
            } else {
                return $this->verifyRegistration($team1, $team2, $data->teams);
            }
        } else {
            return $shuffleTeams->selectWinners($result);
        }
    }

    private function verifyRegistration(int $team1, int $team2, array $teamIds)
    {
        $team1Index = array_search($team1, $teamIds);
        $team2Index = array_search($team2, $teamIds);

        if ($team1Index === false || $team2Index === false) {
            throw new \Exception('One or both teams not found in the registration list.');
        }

        return $team1Index < $team2Index ? $team1 : $team2;
    }

    private function saveMatches(array $data, int $championshipId, string $stage, array $semifinals)
    {
        foreach ($data as $key => $match) {
            $pointTeam1 = $this->poinsGenerate($match['team1_score'], $match['team2_score']);
            $pointTeam2 = $this->poinsGenerate($match['team2_score'], $match['team1_score']);
            $team1_penalties = empty($match['penalties']) ? null : $match['penalties']['team1_penalties'];
            $team2_penalties = empty($match['penalties']) ? null : $match['penalties']['team2_penalties'];

            $dataMatches = [
                'championship_id' => $championshipId,
                'stage' => $stage,
                'team1_id' => $match['team1'],
                'team2_id' => $match['team2'],
                'team1_score' => $match['team1_score'],
                'team2_score' => $match['team2_score'],
                'team1_penalties' => $team1_penalties,
                'team2_penalties' => $team2_penalties,
                'match_winner' => $semifinals[$key],
                'team1_points' => $pointTeam1,
                'team2_points' => $pointTeam2,
                'match_date' => now()->format('Y-m-d H:i:s'),
            ];

            $resp = $this->playChampionshipRepository->createMatches($dataMatches);
            if (!$resp) {
                throw new \Exception('Error saving match data.');
            }
        }
    }

    private function poinsGenerate($myTeam, $opponent): int
    {
        return $myTeam - $opponent;
    }
}
