<?php

namespace App\Service;

use App\DTO\TournamentSearchRequestDTO;
use App\Repository\TournamentRepository;

class TournamentSearchService
{

    public function __construct(
        private readonly TournamentRepository $tournamentRepository
    ) { }
    
    /**
     * Search tournaments applying optional parameters
     * 
     * @param TournamentSearchRequestDTO $tournamentSearchRequestDTO
     * @return array
     */
    public function search(TournamentSearchRequestDTO $tournamentSearchRequestDTO): array
    {
        return $this->tournamentRepository->search(
            $tournamentSearchRequestDTO->getType(),
            $tournamentSearchRequestDTO->getDateMin(),
            $tournamentSearchRequestDTO->getWinnerName()
        );
    }
}