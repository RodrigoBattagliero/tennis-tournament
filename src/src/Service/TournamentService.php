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

    /**
     * Set the strategy used to deteminate a winner between two players
     * 
     * @param PlayInterface $playStrategy
     * @return void
     */
    public function setPlayStrategy(PlayInterface $playStrategy): void
    {
        $this->playStrategy = $playStrategy;
    }

    /**
     * Sets the winner for the tournament
     * 
     * @param Tournament $tournament
     * @return void
     */
    public function setWinner(Tournament $tournament): void
    {
        $winner = $this->getWinner($tournament);
        $tournament->setWinner($winner);
    }

    /**
     * Return the winner for the tournament.
     * 
     * @param Tournament $tournament
     * @return Player
     */
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

    /**
     * Return a PlayerCollection that represents all the winners 
     * for every math in this stage. 
     * This means, the players (winners) who passed to the next stage
     * 
     * @param Stage $stage
     * @return PlayerCollection
     */
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

    /**
     * Apply playStrategy and return the winner
     * 
     * @param Player $playerA
     * @param Player $playerB
     * @return Player
     */
    function playGame(Player $playerA, Player $playerB): Player
    {
        return $this->playStrategy->play($playerA, $playerB);
    }

}