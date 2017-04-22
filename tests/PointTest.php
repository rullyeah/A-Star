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
            'Nada'  => [null, null],
            'string' => ['asd', 'asd']
        ];
    }
}
?>