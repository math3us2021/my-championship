<?php

namespace App\Helpers;

use InvalidArgumentException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ChampionshipDraw
{
    public function handle(array $data, bool $final = false)
    {
        $game = $this->shuffleTeams($data);
        $process = new Process(['python3', base_path('generate_results.py'), json_encode($game), json_encode($final)]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
//        dd('tes');
        return json_decode($process->getOutput(), true);
    }

    public function shuffleTeams(array $teams): array
    {
        $shuffledTeams = $teams;
        shuffle($shuffledTeams);

        return $this->generateGames($shuffledTeams);
    }

    protected function generateGames(array $teams): array
    {
        $games = [];
        for ($i = 0; $i < count($teams); $i += 2) {
            $games[] = [$teams[$i], $teams[$i + 1]];
        }

        return $games;
    }


    public function selectWinners(array $results): array
    {
        $winners = [];
        foreach ($results as $game) {
            if ($game['team1_score'] > $game['team2_score']) {
                $winners[] = $game['team1'];
            } elseif ($game['team1_score'] < $game['team2_score']) {
                $winners[] = $game['team2'];
            } else {
                // No caso de empate, considerar o vencedor nos pênaltis
                if (isset($game['penalties'])) {
                    if ($game['penalties']['team1_penalties'] > $game['penalties']['team2_penalties']) {
                        $winners[] = $game['team1'];
                    } else {
                        $winners[] = $game['team2'];
                    }
                }
            }
        }

        return $winners;
    }
}
