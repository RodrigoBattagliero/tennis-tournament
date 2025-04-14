<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class TournamentPlayerDTO
{
    public function __construct(
        #[Assert\NotBlank]
        private readonly string $name,

        #[Assert\Positive]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $hability,

        #[Assert\Positive]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $strenght,

        #[Assert\Positive]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $travelSpeed,

        #[Assert\Positive]
        #[Assert\Range(min: 0, max: 100)]
        private readonly int $reactionTime
    )
    {
        
    }
}