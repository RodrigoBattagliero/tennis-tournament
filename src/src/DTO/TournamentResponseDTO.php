<?php

namespace App\DTO;
class TournamentResponseDTO
{
    public function __construct(
        private readonly string $type,
        private readonly \DateTimeImmutable $date,
        /**
         * @var PlayerResponseDTO[]
         */
        private readonly array $players = [],
        private readonly PlayerResponseDTO $winner
    )
    {
        
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function getWinner(): PlayerResponseDTO
    {
        return $this->winner;
    }
}