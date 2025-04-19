<?php

namespace App\Mapper;

use PhpParser\Node\Name;
use App\Entity\Tournament as TournamentEntity;
use App\DTO\PlayerResponseDTO;
use App\DTO\TournamentRequestDTO;
use App\DTO\TournamentResponseDTO;
use App\Entity\Tournament as EntityTournament;
use App\ValueObject\Tournament as ValueObjectTournament;

class TournamentMapper
{

    public function __construct(
        private readonly PlayerMapper $playerMapper
    ) { }
    
    /**
     * Transform TournamentRequestDTO to App\ValueObject\Tournament
     * 
     * @param TournamentRequestDTO $tournamentDto
     * return \App\ValueObject\Tournament
     */
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

    /**
     * Transform App\ValueObject\Tournament to App\Entity\Tournament
     * 
     * @param \App\ValueObject\Tournament $valueObjectTournament
     * @return \App\Entity\Tournament
     */
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

    /**
     * Transform App\ValueObject\Tournament to App\Entity\Tournament
     * 
     * @param \App\Entity\Tournament $valueObjectTournament
     * @return \App\DTO\TournamentResponseDTO
     */
    public function fromEntityToDTO(TournamentEntity $tournament): TournamentResponseDTO
    {
        $winner = null;
        $playersDTO = [];
        if ($tournament->getPlayers()->count() > 0) {
            foreach ($tournament->getPlayers() as $player)
            $playersDTO[] = new PlayerResponseDTO(
                name: $player->getName(),
                hability: $player->getHability(),
                strenght: $player->getStrenght(),
                travelSpeed: $player->getTravelSpeed(),
                reactionTime: $player->getReactionTime()
            );
        }

        if ($tournament->getWinner()) {
            $winner = new PlayerResponseDTO(
                name: $tournament->getWinner()->getName(),
                hability: $tournament->getWinner()->getHability(),
                strenght: $tournament->getWinner()->getStrenght(),
                travelSpeed: $tournament->getWinner()->getTravelSpeed(),
                reactionTime:$tournament->getWinner()->getReactionTime()
            );
        }


        $tournamentDto = new TournamentResponseDTO(
            players: $playersDTO,
            type: $tournament->getType(),
            winner: $winner,
            date: $tournament->getCreatedAt()
        );
        
        return $tournamentDto;
    }
}