<?php

namespace App\ValueObject;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class PlayerCollection implements IteratorAggregate, Countable
{
    /**
     * @var Player[]
     */
    private array $players;

    public function add(Player $player)
    {
        $this->players[] = $player;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->players);
    }

    public function count(): int
    {
        return count($this->players);
    }

    public function get(int $index): ?Player
    {
        return $this->players[$index];
    }
}