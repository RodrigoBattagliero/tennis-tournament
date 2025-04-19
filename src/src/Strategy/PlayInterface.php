<?php

namespace App\Strategy;

use App\ValueObject\Player;

/**
 * Abstraction of the logic to determinate the winner between two players
 */
interface PlayInterface
{
    /**
     * Logic to determinate the winner between two players
     * 
     * @param Player $playerA
     * @param Player $playerB
     * @return Player
     */
    public function play(Player $playerA, Player $playerB): Player;
}