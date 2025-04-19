<?php

namespace App\Strategy;

use App\ValueObject\Player;

abstract class PlayDefault  implements PlayInterface
{

    /**
     * Logic to determinate the winner between two players
     * 
     * @param Player $playerA
     * @param Player $playerB
     * @return Player
     */
    public function play(Player $playerA, Player $playerB): Player
    {
        if ($this->getFinalPoints($playerA) > $this->getFinalPoints($playerB)) {
            return $playerA;
        } else {
            return $playerB;
        }
    }

    /**
     * Return the sum for player points and extra points
     * 
     * @param Player $player
     * @return int
     */
    public function getFinalPoints(Player $player): int
    {
        $player->setExtraPoints($this->getExtraPoints());
        return $this->getPlayerPoints($player) + $player->getExtraPoints();
    }

    /**
     * Return the sum for player points
     * 
     * @param Player $player
     * @return int
     */
    public function getPlayerPoints(Player $player): int
    {
        return $player->getHability() + $player->getStrenght() + $player->getTravelSpeed() + $player->getReactionTime();
    }

    /**
     * extra points
     * 
     * @param Player $player
     * @return int
     */
    public function getExtraPoints(): int
    {
        return random_int(0, 100);
    }
}