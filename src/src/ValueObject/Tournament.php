<?php

namespace App\ValueObject;

use App\Const\TournamentType;
use App\Const\TournamentLogarithmBase;

class Tournament
{
    private ?string $name;
    private string $type;
    private ?PlayerCollection $players;
    private ?StageCollection $stages;
    private ?Player $winner;

    public function __construct()
    {
        $this->players = new PlayerCollection();
        $this->stages = new StageCollection();
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPlayers(): ?PlayerCollection
    {
        return $this->players;
    }

    public function getStages(): ?StageCollection
    {
        return $this->stages;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setPlayers(?PlayerCollection $players): void
    {
        $this->players = $players;
    }

    public function setStages(?array $stages): void
    {
        $this->stages = $stages;
    }

    public function addPlayer(Player $player): void
    {
        $this->players->add($player);
    }

    public function setWinner(?Player $player): void
    {
        $this->winner = $player;
    }

    public function getWinner(): ?Player
    {
        return $this->winner;
    }

    public function addStage(Stage $stage): void
    {
        $this->stages->add($stage);
    }

    public function initializeStages()
    {
        $numberOfStagesToInitialize = log($this->getPlayers()->count(), TournamentLogarithmBase::LOGARITHM_BASE);
        for ($i = 0; $i < $numberOfStagesToInitialize; $i++) {
            $stage = new Stage;
            $this->addStage($stage);
        }
    }
}