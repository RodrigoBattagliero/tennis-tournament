<?php

namespace App\Mapper;

use App\ValueObject\Player as ValueObjectPlayer;
use App\DTO\TournamentPlayerDTO;
use App\Entity\Player as EntityPlayer;

class PlayerMapper
{
    public function fromDtoToValueObject(TournamentPlayerDTO $playerDTO): ValueObjectPlayer
    {
        $player = new ValueObjectPlayer();
        $player->setName($playerDTO->getName());
        $player->setHability($playerDTO->getHability());
        $player->setStrenght($playerDTO->getStrenght());
        $player->setTravelSpeed($playerDTO->getTravelSpeed());
        $player->setReactionTime($playerDTO->getReactionTime());
        
        return $player;
    }

    public function fromValueObjectToEntity(ValueObjectPlayer $valueObjectPlayer): EntityPlayer
    {
        $entityPlayer = new EntityPlayer();
        $entityPlayer->setName($valueObjectPlayer->getName());
        $entityPlayer->setHability($valueObjectPlayer->getHability());
        $entityPlayer->setStrenght($valueObjectPlayer->getStrenght());
        $entityPlayer->setTravelSpeed($valueObjectPlayer->getTravelSpeed());
        $entityPlayer->setReactionTime($valueObjectPlayer->getReactionTime());
        
        return $entityPlayer;
    }
}