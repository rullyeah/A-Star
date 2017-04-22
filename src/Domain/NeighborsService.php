<?php 

namespace AStar\Domain;

use  AStar\Domain\Point;

class NeighborsService
{   
    protected $ortogonalCost;
    protected $diagonalCost;

    public function __construct($ortogonalCost = 10, $diagonalCost = 14)
    {
        $this->ortogonalCost = $ortogonalCost;
        $this->diagonalCost = $diagonalCost;
    }

    public function ortogonalCost()
    {
        return $this->ortogonalCost;
    }

    public function diagonalCost()
    {
        return $this->diagonalCost;
    }

    public function allNeighbors(Point $point)
    {
        return [
            'ortogonalNeighbors' => $this->ortogonalNeighbors($point),
            'diagonalNeighbors' => $this->diagonalNeighbors($point)
        ];
    }

    public function ortogonalNeighbors(Point $point)
    {
        return [
            'west' => $this->westPoint($point),
            'east' => $this->eastPoint($point),
            'north' => $this->northPoint($point),
            'south' => $this->southPoint($point)
        ];
    }

    public function diagonalNeighbors(Point $point)
    {
        return [
            'northWest' => $this->northWest($point),
            'northEast' => $this->northEast($point),
            'southWest' => $this->southWest($point),
            'southEast' => $this->southEast($point)
        ];
    }

    public function westPoint(Point $point)
    {
        return [
            'point' => new Point($point->x()-1, $point->y()),
            'cost' => $this->ortogonalCost()
        ];
    }
    public function eastPoint(Point $point)
    {
        return [
            'point' => new Point($point->x()+1, $point->y()),
            'cost' => $this->ortogonalCost()
        ];
    }

    public function northPoint(Point $point)
    {
        return [
            'point' => new Point($point->x(), $point->y()+1),
            'cost' => $this->ortogonalCost()
        ];
    }

    public function southPoint(Point $point)
    {
        return [
            'point' => new Point($point->x(), $point->y()-1),
            'cost' => $this->ortogonalCost()
        ];
    }

    public function northWest(Point $point)
    {
        return [
            'point' => new Point($point->x()-1, $point->y()+1),
            'cost' => $this->diagonalCost()
        ];
    }

    public function northEast(Point $point)
    {
        return [
            'point' => new Point($point->x()+1, $point->y()+1),
            'cost' => $this->diagonalCost()
        ];
    }

    public function southWest(Point $point)
    {
        return [
            'point' => new Point($point->x()-1, $point->y()-1),
            'cost' => $this->diagonalCost()
        ];
    }

    public function southEast(Point $point)
    {
        return [
            'point' => new Point($point->x()+1, $point->y()-1),
            'cost' => $this->diagonalCost()
        ];
    }
}

?>