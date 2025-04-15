<?php

namespace App\Service;

use App\Builder\PlayStrategyBuilder;
use App\DTO\TournamentRequestDTO;
use App\Mapper\TournamentMapper;

class GameService
{

    public function __construct(
        private readonly TournamentService $tournamentService,
        private readonly TournamentMapper $tournamentMapper,
        private readonly PlayStrategyBuilder $playStrategyBuilder
    ) { }

    public function startGame(TournamentRequestDTO $tournamentRequestDTO)
    {
        $tournament = $this->tournamentMapper->fromDtoToValueObject($tournamentRequestDTO);

        $playStrategy = $this->playStrategyBuilder->getPlayStrategy($tournament);

        $this->tournamentService->setPlayStrategy($playStrategy);

        $this->tournamentService->setWinner($tournament);

        return $tournament;
    }
}