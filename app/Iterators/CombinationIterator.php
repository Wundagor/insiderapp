<?php

namespace App\Iterators;

class CombinationIterator implements \Iterator
{
    /**
     * @var
     */
    private $collection;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var false
     */
    private $reverse = false;

    /**
     * CombinationIterator constructor.
     *
     * @param \IteratorAggregate $collection
     * @param false $reverse
     */
    public function __construct(\IteratorAggregate $collection, bool $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    /**
     * Get current position of iteration
     *
     * @return array
     */
    public function current(): array
    {
        return $this->collection->getItems()[$this->position];
    }

    /**
     * Set next position of iteration
     */
    public function next(): void
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    /**
     * Get current position of iteration
     *
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Check items by position
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }

    /*
     * Set position in default position
     */
    public function rewind(): void
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }
}
