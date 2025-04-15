<?php

namespace App\Strategy;

use App\ValueObject\Player;

class PlayDefaultFemale implements PlayInterface
{
    public function play(Player $playerA, Player $playerB): Player
    {
        if ($this->getFinalPoints($playerA) > $this->getFinalPoints($playerB)) {
            return $playerA;
        } else {
            return $playerB;
        }
    }

    public function getFinalPoints(Player $player): int
    {
        return $this->getPlayerPoints($player) + $this->getExtraPoints();
    }

    public function getPlayerPoints(Player $player): int
    {
        return $player->getHability() * 2 + $player->getReactionTime();
    }

    public function getExtraPoints(): int
    {
        return random_int(0, 100);
    }
}