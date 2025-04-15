<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class TournamentSearchRequestDTO
{
    public function __construct(
        #[Assert\Choice(['M', 'F', ''])]
        private readonly ?string $type,
        private readonly ?\DateTimeImmutable $date,
        private readonly ?string $winnerName
    ) { }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function getWinnerName(): ?string
    {
        return $this->winnerName;
    }
}