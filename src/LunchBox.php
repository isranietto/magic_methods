<?php


namespace Styde;


class LunchBox implements \IteratorAggregate, \Countable
{
    protected $food = [];

    protected $original = true;

    public function __construct(array $food = [])
    {
        $this->food = $food;
    }

    public function filter($callback) //inmutable
    {
        return new static (array_filter($this->food , $callback));
    }

    public function shift() // mutable
    {
        return array_shift($this->food);
    }

    public function isEmpty()
    {
        return empty($this->food);
    }

    public function getIterator() {
        return new \ArrayIterator($this->food);
    }

    public function count()
    {
        return count($this->food);
    }


}