<?php

namespace App\Strategy;

use App\ValueObject\Player;

class PlayDefaultFemale extends PlayDefault
{
    /**
     * Return the sum for player points
     * 
     * @param Player $player
     * @return int
     */
    public function getPlayerPoints(Player $player): int
    {
        return $player->getHability() * 2 + $player->getReactionTime();
    }
}