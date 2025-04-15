<?php 

namespace App\ValueObject;

class Stage
{
    private ?PlayerCollection $players;

    public function __construct()
    {
        $this->players = new PlayerCollection();
    }
    
    public function setPlayers(PlayerCollection $players): void
    {
        $this->players = $players;
    }

    public function getPlayers(): ?PlayerCollection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): void
    {
        $this->players->add($player);
    }
}