<?php

namespace App\Service;

use App\Const\TournamentType;
use App\DTO\TournamentRequestDTO;

class GameService
{
    const LOGARITHM_BASE = 2;
    // se puede mejorar con dto 
    public function startGame(TournamentRequestDTO $tournamentRequestDTO)
    {
        # Mezclo jugadores
        # init stages - inicia el primer stage
        $stages = [];
        $winner = null;
        $stagePlayers = $players;
        $stageIndex = 0;
        $stages[] = ['stage' => $stageIndex, 'players' => $stagePlayers];
        do {
            $stageIndex++;
            $stageWinner = [];
            $games = count($stagePlayers) / 2;
            for ($i = 0; $i < $games; $i++) {
                $stageWinner[] = $this->playGame(
                    $stagePlayers[$i], 
                    $stagePlayers[$i + $games], 
                    $type
                );
            }
            if (count($stageWinner) == 1) {
                $winner = $stageWinner[0];
                $stages[] = ['stage' => $stageIndex, 'winner' => $winner];
            } else {
                $stagePlayers = $stageWinner;
                $stages[] = ['stage' => $stageIndex, 'players' => $stagePlayers];
            }

        } while (!$winner);

        return $stages;

    }

    function playGame($player1, $player2, $type)
    {
        if ($player1['hability'] > $player2['hability']) {
            return $player1;
        } elseif ($player1['hability'] < $player2['hability']) {
            return $player2;
        } else {
            if ($type == TournamentType::MALE) {
                if ($player1['fuerza'] > $player2['fuerza']) {
                    return $player1;
                } elseif ($player1['fuerza'] < $player2['fuerza']) {
                    return $player2;
                } else {
                    if ($player1['velocidad_desplazamiento'] > $player2['velocidad_desplazamiento']) {
                        return $player1;
                    } elseif ($player1['velocidad_desplazamiento'] < $player2['velocidad_desplazamiento']) {
                        return $player2;
                    }
                }
                return $player1;
            } else {
                if ($player1['tiempo_de_reaccion'] > $player2['tiempo_de_reaccion']) {
                    return $player1;
                } elseif ($player1['tiempo_de_reaccion'] < $player2['tiempo_de_reaccion']) {
                    return $player2;
                } else {
                    return $player1;
                }
            }
        }
    }

    /* function getStages($playersCount)
    {
        return log($playersCount, self::LOGARITHM_BASE);
    } */
}