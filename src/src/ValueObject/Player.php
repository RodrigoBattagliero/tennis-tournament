<?php

namespace App\ValueObject;

class Player
{
    private string $name;
    private int $hability;
    private int $strenght;
    private int $travelSpeed;
    private int $reactionTime;
    private ?int $extraPoints;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getHability(): int
    {
        return $this->hability;
    }

    public function setHability(int $hability): void
    {
        $this->hability = $hability;
    }

    public function getStrenght(): int
    {
        return $this->strenght;
    }

    public function setStrenght(int $strenght): void
    {
        $this->strenght = $strenght;
    }

    public function getTravelSpeed(): int
    {
        return $this->travelSpeed;
    }

    public function setTravelSpeed(int $travelSpeed): void
    {
        $this->travelSpeed = $travelSpeed;
    }

    public function getReactionTime(): int
    {
        return $this->reactionTime;
    }

    public function setReactionTime(int $reactionTime): void
    {
        $this->reactionTime = $reactionTime;
    }

    public function getExtraPoints(): int
    {
        return $this->extraPoints;
    }

    public function setExtraPoints(int $extraPoints): void
    {
        $this->extraPoints = $extraPoints;
    }
}