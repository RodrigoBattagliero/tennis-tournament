<?php

namespace App\Mapper;

use App\ValueObject\Tournament;
use App\DTO\TournamentRequestDTO;

class TournamentMapper
{

    public function __construct(
        private readonly PlayerMapper $playerMapper
    ) { }

    public function fromDtoToValueObject(TournamentRequestDTO $tournamentDto): Tournament
    {
        $tournament = new Tournament();
        $tournament->setType($tournamentDto->getType());
        $tournament->setName('');
        foreach ($tournamentDto->getPlayers() as $playerDto) {
            $tournament->addPlayer($this->playerMapper->fromDtoToValueObject($playerDto));
        }

        return $tournament;
    }
}