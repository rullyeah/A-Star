<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testNew()
    {
        $bean = new Point();
        $this->assertInstanceOf(Point::class, $bean);
    }
}
?>