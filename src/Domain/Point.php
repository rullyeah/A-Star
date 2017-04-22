<?php 

namespace AStar\Domain;

class Point
{
    protected $x;
    protected $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function equals(Point $point): bool
    {
        return $this->x == $point->x() && $this->y == $point->y();
    }
}

?>