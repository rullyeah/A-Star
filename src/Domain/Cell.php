<?php 

namespace AStar\Domain;

use AStar\Domain\Point;

class Cell
{
    protected $point;
    protected $parent;
    protected $g;
    protected $h;

    public function __construct(Point $point)
    {
        $this->point = $point;
        $this->g = INF;
        $this->h = INF;
        $this->parent = null;
    }

    public function g()
    {
        return $this->g;
    }

    public function h()
    {
        return $this->h;
    }

    public function f()
    {
        return $this->g + $this->h;
    }

    public function point() : Point
    {
        return $this->point;
    }

    public function parent()
    {
        return $this->parent;
    }

    public function setParent(Cell $parent)
    {
        $this->parent = $parent;
    }

    public function setG($g)
    {
        $this->g = $g;
    }

    public function setH($h)
    {
        $this->h = $h;
    }

    public function equals(Cell $cell)
    {
        return $this->point->equals($cell->point);
    }

    public function ref(): string
    {
        return $this->point->toString();
    }

    public static function compareF(Cell $cell1, Cell $cell2)
    {
        return $cell1->f() - $cell2->f();
    }
}

?>