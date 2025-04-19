<?php

namespace App\DTO;

class PlayerResponseDTO
{
    public function __construct(
        private readonly ?string $name,
        private readonly ?int $hability,
        private readonly ?int $strenght,
        private readonly ?int $travelSpeed,
        private readonly ?int $reactionTime
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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setHability(?int $hability): void
    {
        $this->hability = $hability;
    }

    public function setStrenght(?int $strenght): void
    {
        $this->strenght = $strenght;
    }

    public function setTravelSpeed(?int $travelSpeed): void
    {
        $this->travelSpeed = $travelSpeed;
    }

    public function setReactionTime(?int $reactionTime): void
    {
        $this->reactionTime = $reactionTime;
    }
}