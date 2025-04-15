<?php

namespace App\Service;

use App\DTO\TournamentSearchRequestDTO;
use App\Repository\TournamentRepository;

class TournamentSearchService
{

    public function __construct(
        private readonly TournamentRepository $tournamentRepository
    )
    {
        
    }
    public function search(TournamentSearchRequestDTO $tournamentSearchRequestDTO)
    {
        return $this->tournamentRepository->search(
            $tournamentSearchRequestDTO->getType(),
            $tournamentSearchRequestDTO->getDate(),
            $tournamentSearchRequestDTO->getWinnerName()
        );
    }
}