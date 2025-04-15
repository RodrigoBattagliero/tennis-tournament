<?php

namespace App\Mapper;

use App\ValueObject\Tournament as ValueObjectTournament;
use App\DTO\TournamentRequestDTO;
use App\Entity\Player;
use App\Entity\Tournament as EntityTournament;

class TournamentMapper
{

    public function __construct(
        private readonly PlayerMapper $playerMapper
    ) { }

    public function fromDtoToValueObject(TournamentRequestDTO $tournamentDto): ValueObjectTournament
    {
        $tournament = new ValueObjectTournament();
        $tournament->setType($tournamentDto->getType());
        $tournament->setName('');
        foreach ($tournamentDto->getPlayers() as $playerDto) {
            $tournament->addPlayer($this->playerMapper->fromDtoToValueObject($playerDto));
        }

        return $tournament;
    }

    public function fromValueObjectToEntity(ValueObjectTournament $valueObjectTournament): EntityTournament
    {
        $entityTournament = new EntityTournament();
        $entityTournament->setName($valueObjectTournament->getName());
        $entityTournament->setType($valueObjectTournament->getType());
        $entityTournament->setWinner(
            $this->playerMapper->fromValueObjectToEntity($valueObjectTournament->getWinner())
        );
        foreach ($valueObjectTournament->getPlayers() as $valueObjectPlayer) {
            $entityTournament->addPlayer(
                $this->playerMapper->fromValueObjectToEntity($valueObjectPlayer)
            );
        }
        
        return $entityTournament;
    }
}