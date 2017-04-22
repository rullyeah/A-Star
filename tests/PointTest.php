<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testNew()
    {
        $bean = new Point(0,0);
        $this->assertInstanceOf(Point::class, $bean);
    }

    /**
     * @dataProvider invalidCoordsProvider
     */
    public function testInvalidCoordsLaunchException($x, $y)
    {
        $this->expectException(\TypeError::class);
        $bean = new Point($x,$y);
    }

    public function invalidCoordsProvider()
    {
        return [
            'Nothing'  => [null, null],
            'string' => ['asd', 'asd']
        ];
    }

    /**
     * @dataProvider validCoordsProvider
     */
    public function testGetX($x, $y, $expectedX, $expectedY)
    {
        $bean = new Point($x,$y);
        $this->assertEquals($expectedX, $bean->x());
    }

    /**
     * @dataProvider validCoordsProvider
     */
    public function testGetY($x, $y, $expectedX, $expectedY)
    {
        $bean = new Point($x,$y);
        $this->assertEquals($expectedY, $bean->y());
    }

    public function validCoordsProvider()
    {
        return [
            'root'  => [0, 0, 0, 0],
            'string numbers' => ['3', '5', 3, 5],
            'negative numbers' => [-3, -1, -3, -1],
            'float numbers' => [2.5, 3.111, 2, 3],
            'mix numbers' => ['3.18', '-5', 3, -5]
        ];
    }

    /**
     * @dataProvider samePoints
     */
    public function testEquals($startPoint, $endPoint)
    {
        $this->assertTrue($startPoint->equals($endPoint));
    }

    public function samePoints()
    {   
        $point = new Point(0,0);
        return [
            'same' => [$point, $point],
            'zero' => [$point, new Point(0,0)],
            'commutative' => [new Point(0,0), $point],
            'other' => [new Point(3,-1), new Point(3,-1)],
        ];
    }
}
?>