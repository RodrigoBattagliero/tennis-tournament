<?php

namespace App\Builder;

use App\Const\TournamentType;
use App\Strategy\PlayInterface;
use App\ValueObject\Tournament;
use App\Strategy\PlayDefaultMale;
use App\Strategy\PlayDefaultFemale;

class PlayStrategyBuilder
{
    public function getPlayStrategy(Tournament $tournament): PlayInterface
    {
        $playStrategy = match ($tournament->getType()) {
            TournamentType::FEMALE => new PlayDefaultFemale,
            TournamentType::MALE   => new PlayDefaultMale,
        };

        return $playStrategy;

    }
}