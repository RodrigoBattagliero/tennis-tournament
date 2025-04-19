<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class TournamentPlayerDTO
{
    public function __construct(
        #[Assert\NotBlank]
        private readonly string $name,

        #[Assert\PositiveOrZero()]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $hability,

        #[Assert\PositiveOrZero()]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $strenght,

        #[Assert\PositiveOrZero()]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $travelSpeed,

        #[Assert\PositiveOrZero()]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $reactionTime
    )
    {
        
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHability(): ?int
    {
        return $this->hability;
    }

    public function getStrenght(): ?int
    {
        return $this->strenght;
    }

    public function getTravelSpeed(): ?int
    {
        return $this->travelSpeed;
    }

    public function getReactionTime(): ?int
    {
        return $this->reactionTime;
    }
}