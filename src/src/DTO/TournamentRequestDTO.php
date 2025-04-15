<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class TournamentRequestDTO
{
    public function __construct(
        #[Assert\Choice(['M', 'F'])]
        private readonly string $type,

        /**
         * @var TournamentPlayerDTO[]
         */
        #[Assert\Type('array')]
        #[Assert\Count(min: 1)]
        #[Assert\Valid()]
        private readonly array $players = []
    )
    {
        
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }
}