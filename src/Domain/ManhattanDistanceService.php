<?php 

namespace AStar\Domain;

use  AStar\Domain\Point;

Class ManhattanDistanceService
{
    public function execute(Point $startPoint, Point $endPoint)
    {
        $x = $endPoint->x() - $startPoint->x();
        $y = $endPoint->y() - $startPoint->y();
        return abs($x) + abs($y); 
    }
}

?>