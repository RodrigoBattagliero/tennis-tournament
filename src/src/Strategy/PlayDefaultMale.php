<?php

namespace App\Strategy;

use App\ValueObject\Player;

class PlayDefaultMale implements PlayInterface
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
        $player->setExtraPoints($this->getExtraPoints());
        return $this->getPlayerPoints($player) + $player->getExtraPoints();
    }

    public function getPlayerPoints(Player $player): int
    {
        return $player->getHability() * 3 + $player->getStrenght() * 2 + $player->getTravelSpeed();
    }

    public function getExtraPoints(): int
    {
        return random_int(0, 100);
    }
}