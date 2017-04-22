<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    protected $point;

    public function setUp()
    {
        $this->point = new Point(0,0);
    }

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
}
?>