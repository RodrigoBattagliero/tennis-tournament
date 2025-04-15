<?php

namespace App\Service;

use App\ValueObject\Player;
use App\Strategy\PlayInterface;
use App\ValueObject\PlayerCollection;
use App\ValueObject\Stage;
use App\ValueObject\Tournament;

class TournamentService
{
    private readonly PlayInterface $playStrategy;

    public function setPlayStrategy(PlayInterface $playStrategy)
    {
        $this->playStrategy = $playStrategy;
    }

    public function setWinner(Tournament $tournament)
    {
        $winner = $this->getWinner($tournament);
        $tournament->setWinner($winner);
    }

    public function getWinner(Tournament $tournament): Player
    {
        $winner = null;
        $tournament->initializeStages();
        $stages = $tournament->getStages();
        $playersForNextStage = $tournament->getPlayers();

        for ($i = 0; $i < $stages->count(); $i++) {
            $stages->get($i)->setPlayers($playersForNextStage);
            $playersForNextStage = $this->getStageWinner($stages->get($i));

            if ($playersForNextStage->count() == 1) {
                $winner = $playersForNextStage->get(0);
            }
        }
        
        return $winner;
    }

    public function getStageWinner(Stage $stage): PlayerCollection
    {
        $stageWinner = new PlayerCollection;

        $games = $stage->getPlayers()->count() / 2;
        for ($i = 0; $i < $games; $i++) {
            $winner = $this->playGame(
                $stage->getPlayers()->get($i),
                $stage->getPlayers()->get($i + $games)
            );
            $stageWinner->add($winner);
        }

        return $stageWinner;
    }

    function playGame(Player $playerA, Player $playerB): Player
    {
        return $this->playStrategy->play($playerA, $playerB);
    }

}