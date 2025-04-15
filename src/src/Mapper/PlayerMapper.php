<?php

namespace App\Mapper;

use App\ValueObject\Player;
use App\DTO\TournamentPlayerDTO;

class PlayerMapper
{
    public function fromDtoToValueObject(TournamentPlayerDTO $playerDTO): Player
    {
        $player = new Player();
        $player->setName($playerDTO->getName());
        $player->setHability($playerDTO->getHability());
        $player->setStrenght($playerDTO->getStrenght());
        $player->setTravelSpeed($playerDTO->getTravelSpeed());
        $player->setReactionTime($playerDTO->getReactionTime());
        
        return $player;
    }
}