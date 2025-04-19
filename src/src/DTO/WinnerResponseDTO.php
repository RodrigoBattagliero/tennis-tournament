<?php

namespace App\DTO;

class WinnerResponseDTO extends PlayerResponseDTO
{
    public function __construct(
        private readonly ?string $name,
        private readonly ?int $hability,
        private readonly ?int $strenght,
        private readonly ?int $travelSpeed,
        private readonly ?int $reactionTime,
        private int $extraPoints = 0
    )
    {
        parent::__construct(
            $this->name,
            $this->hability,
            $this->strenght,
            $this->travelSpeed,
            $this->reactionTime
        );
    }

    public function setExtraPoints(int $points)
    {
        $this->extraPoints = $points;
    }

    public function getExtraPoints(): int
    {
        return $this->extraPoints;
    }
}