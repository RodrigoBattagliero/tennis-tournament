<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $hability = null;

    #[ORM\Column(nullable: true)]
    private ?int $strenght = null;

    #[ORM\Column(nullable: true)]
    private ?int $travelSpeed = null;

    #[ORM\Column(nullable: true)]
    private ?int $reactionTime = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getHability(): ?int
    {
        return $this->hability;
    }

    public function setHability(int $hability): static
    {
        $this->hability = $hability;

        return $this;
    }

    public function getStrenght(): ?int
    {
        return $this->strenght;
    }

    public function setStrenght(?int $strenght): static
    {
        $this->strenght = $strenght;

        return $this;
    }

    public function getTravelSpeed(): ?int
    {
        return $this->travelSpeed;
    }

    public function setTravelSpeed(?int $travelSpeed): static
    {
        $this->travelSpeed = $travelSpeed;

        return $this;
    }

    public function getReactionTime(): ?int
    {
        return $this->reactionTime;
    }

    public function setReactionTime(?int $reactionTime): static
    {
        $this->reactionTime = $reactionTime;

        return $this;
    }

}
