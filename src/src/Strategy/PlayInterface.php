<?php

namespace App\Strategy;

use App\ValueObject\Player;

interface PlayInterface
{
    public function play(Player $player1, Player $player2): Player;
}