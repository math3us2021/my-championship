<?php

namespace App\Services\playchampionship;

use App\DTO\PlayChampionshipDTO;
use App\Helpers\ChampionshipDraw;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;

class PlayChampionshipService implements PlayChampionshipServiceInterface
{
    public function create(PlayChampionshipDTO $data): array
    {
        ///criar vinculo com campeonato com os times


            /// separar os jogos
        $shuffleTeams = new ChampionshipDraw();
        $quarterfinals = $shuffleTeams->handle($data->teams);
//        dd('tes');
        $semifinals = $shuffleTeams->selectWinners($quarterfinals);

        $semifinalsGame = $shuffleTeams->handle($semifinals);
        $final = $shuffleTeams->selectWinners($semifinalsGame);

        $finalGames = $shuffleTeams->handle($final,true);

//        $finalWinner = $shuffleTeams->selectWinners($finalGames);
        $champion = $this->verifyAtie($finalGames, $data, $shuffleTeams);

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
        }else{
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

}
