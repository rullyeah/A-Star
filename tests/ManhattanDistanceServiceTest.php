<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use AStar\Domain\ManhattanDistanceService;
use PHPUnit\Framework\TestCase;

class ManhattanDistanceServiceTest extends TestCase
{
    public function testNew()
    {
        $bean = new ManhattanDistanceService();
        $this->assertInstanceOf(ManhattanDistanceService::class, $bean);
    }

    /**
     * @dataProvider validManhattanPoints
     */
    public function testExecute(
        Point $startPoint, Point $endPoint, int $distance
    ) {
        $manhattanDistanceService = new ManhattanDistanceService();
        $this->assertEquals(
            $distance, 
            $manhattanDistanceService->execute($startPoint,$endPoint)
        );
    }

    public function validManhattanPoints()
    {
        $point = new Point(0,0);
        return [
            'same'  => [$point, $point, 0],
            'one' => [$point, new Point(1,1), 2],
            'negative coords' => [new Point(-1,-1), new Point(-2,-2), 2],
            'mixed coords' => [new Point(-2,4), new Point(5,-3), 14],
            'from zero' => [$point, new Point(-2,4), 6],
            'to zero' => [new Point(-1,-1), $point, 2],
        ];
    }
}
?>