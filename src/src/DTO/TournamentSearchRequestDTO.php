<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class TournamentSearchRequestDTO
{
    public function __construct(
        #[Assert\Choice(['M', 'F', ''])]
        private readonly ?string $type,
        private readonly ?\DateTimeImmutable $dateMin,
        private readonly ?string $winnerName
    ) { }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getDateMin(): ?\DateTimeImmutable
    {
        return $this->dateMin;
    }

    public function getWinnerName(): ?string
    {
        return $this->winnerName;
    }
}