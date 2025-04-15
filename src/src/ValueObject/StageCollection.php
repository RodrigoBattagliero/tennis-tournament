<?php

namespace App\ValueObject;

use Countable;
use Traversable;
use ArrayIterator;
use IteratorAggregate;

class StageCollection implements IteratorAggregate, Countable
{
    /**
     * @var Stage[]
     */
    private array $stages;

    public function add(Stage $stage)
    {
        $this->stages[] = $stage;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->stages);
    }

    public function count(): int
    {
        return count($this->stages);
    }

    public function get(int $i): ?Stage
    {
        return $this->stages[$i];
    }
}