<?php

namespace App\Services\playchampionship;

use App\DTO\PlayChampionshipDTO;
use App\Helpers\ChampionshipDraw;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;
use App\Models\MatchesPlayed;
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
        ///criar vinculo com campeonato com os times


        /// separar os jogos
        $shuffleTeams = new ChampionshipDraw();
        $quarterfinals = $shuffleTeams->handle($data->teams);
        $this->saveMatches($quarterfinals, $data->championshipId, 'quartas de final');

        $semifinals = $shuffleTeams->selectWinners($quarterfinals);
        $semifinalsGame = $shuffleTeams->handle($semifinals);
        $this->playChampionshipRepository->createMatches($semifinalsGame);

        $final = $shuffleTeams->selectWinners($semifinalsGame);
        $finalGames = $shuffleTeams->handle($final, true);
        $champion = $this->verifyAtie($finalGames, $data, $shuffleTeams);
        $this->playChampionshipRepository->createMatches($finalGames);


        dd($semifinals, $final, $finalGames, $champion);

        ///FINAL NÃO TEM PENALTIS

        ///salvar informações dos jogos


        /// pontuação

        ///  retornar campeao

//        $championship = Championship::findOrFail($data->championshipId);
////        dd($championship, $data->teams );
//        $championship->teams()->assign($data->teams);
//        dd($data);
        return [];
    }

    private function verifyAtie(array $result, PlayChampionshipDTO $data, ChampionshipDraw $shuffleTeams)
    {
        $team1 = $result[0]['team1_score'];
        $team2 = $result[0]['team2_score'];
        if ($team1 == $team2) {
            $team1Points = $points[$team1] ?? 0;
            $team2Points = $points[$team2] ?? 0;

            if ($team1Points > $team2Points) {
                return $team1;
            } elseif ($team2Points > $team1Points) {
                return $team2;
            } else {
                return $this->verifyRegistration($team1, $team2, $data->teams);
            }
        } else {
            $shuffleTeams->selectWinners($result);
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

    private function saveMatches(array $data, string $championshipId, string $stage)
    {
        foreach ($data as $match) {
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
                'team1_points' => $pointTeam1,
                'team2_points' => $pointTeam2,
                'match_date' => now()->format('Y-m-d H:i:s'),
            ];
            return $this->playChampionshipRepository->createMatches($dataMatches);
        }
    }

    private function poinsGenerate($myTeam, $opponent): int
    {
        return $myTeam - $opponent;
    }
}
