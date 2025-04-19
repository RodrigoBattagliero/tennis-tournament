<?php

namespace App\Mapper;

use App\DTO\PlayerResponseDTO;
use App\DTO\WinnerResponseDTO;
use App\DTO\TournamentPlayerDTO;
use App\Entity\Player as EntityPlayer;
use App\ValueObject\Player as ValueObjectPlayer;

class PlayerMapper
{

    /**
     * Transform TournamentPlayerDTO to App\ValueObject\Player
     * 
     * @param TournamentPlayerDTO $playerDTO
     * @return \App\ValueObject\Player
     */
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

    /**
     * Transform App\Entity\Player to App\ValueObject\Player
     * 
     * @param \App\ValueObject\Player $valueObjectPlayer
     * @return \App\Entity\Player
     */
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

    /**
     * Transform App\Entity\Player to App\ValueObject\Player
     * 
     * @param \App\ValueObject\Player $valueObjectPlayer
     * @return \App\DTO\WinnerResponseDTO
     */
    public function fromValueObjectToDTO(ValueObjectPlayer $valueObjectPlayer): WinnerResponseDTO
    {
        $winnerResponseDTO = new WinnerResponseDTO(
            name: $valueObjectPlayer->getName(),
            hability: $valueObjectPlayer->getHability(),
            strenght: $valueObjectPlayer->getStrenght(),
            travelSpeed: $valueObjectPlayer->getTravelSpeed(),
            reactionTime: $valueObjectPlayer->getReactionTime(),
            extraPoints:$valueObjectPlayer->getExtraPoints()
        );

        return $winnerResponseDTO;
    }
}