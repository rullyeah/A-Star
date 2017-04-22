<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use AStar\Domain\NeighborsService;
use PHPUnit\Framework\TestCase;

class NeighborsServiceTest extends TestCase
{
    protected $neighborsService;

    public function setUp()
    {
        $this->neighborsService= new NeighborsService();
    }

    public function testNewWithoutCosts()
    {
        $bean = new NeighborsService();
        $this->assertInstanceOf(NeighborsService::class, $bean);
        $this->assertEquals(10, $bean->ortogonalCost());
        $this->assertEquals(14, $bean->diagonalCost());
    }

    public function testNewWithCosts()
    {
        $bean = new NeighborsService(5, 12);
        $this->assertInstanceOf(NeighborsService::class, $bean);
        $this->assertEquals(5, $bean->ortogonalCost());
        $this->assertEquals(12, $bean->diagonalCost());
    }

    public function testWestPoint()
    {
        $point = new Point(0,0);
        $neighborPoint = $this->neighborsService->west($point);
        $this->assertEquals(10, $neighborPoint['cost']);
        $this->assertTrue($neighborPoint['point']->equals(new Point(-1,0)));
    }

    public function testEastPoint()
    {
        $point = new Point(0,0);
        $neighborPoint = $this->neighborsService->east($point);
        $this->assertEquals(10, $neighborPoint['cost']);
        $this->assertTrue($neighborPoint['point']->equals(new Point(1,0)));
    }

    public function testNorthPoint()
    {
        $point = new Point(0,0);
        $neighborPoint = $this->neighborsService->north($point);
        $this->assertEquals(10, $neighborPoint['cost']);
        $this->assertTrue($neighborPoint['point']->equals(new Point(0,1)));
    }

    public function testSouthPoint()
    {
        $point = new Point(0,0);
        $neighborPoint = $this->neighborsService->south($point);
        $this->assertEquals(10, $neighborPoint['cost']);
        $this->assertTrue($neighborPoint['point']->equals(new Point(0,-1)));
    }

    public function test()
    {
        $point = new Point(0,0);
        $neighborsPoint = $this->neighborsService->allNeighbors($point);
        $this->assertEquals(
            10, $neighborsPoint['ortogonalNeighbors']['west']['cost']
        );
        $this->assertEquals(
            10, $neighborsPoint['ortogonalNeighbors']['east']['cost']
        );
        $this->assertEquals(
            10, $neighborsPoint['ortogonalNeighbors']['north']['cost']
        );
        $this->assertEquals(
            10, $neighborsPoint['ortogonalNeighbors']['south']['cost']
        );
        $this->assertEquals(
            14, $neighborsPoint['diagonalNeighbors']['northWest']['cost']
        );
        $this->assertEquals(
            14, $neighborsPoint['diagonalNeighbors']['northEast']['cost']
        );
        $this->assertEquals(
            14, $neighborsPoint['diagonalNeighbors']['southWest']['cost']
        );
        $this->assertEquals(
            14, $neighborsPoint['diagonalNeighbors']['southEast']['cost']
        );
        $this->assertTrue(
            $neighborsPoint['ortogonalNeighbors']['west']['point']->equals(
                new Point(-1,0))
        );
        $this->assertTrue(
            $neighborsPoint['ortogonalNeighbors']['east']['point']->equals(
                new Point(1,0))
        );
        $this->assertTrue(
            $neighborsPoint['ortogonalNeighbors']['north']['point']->equals(
                new Point(0,1))
        );
        $this->assertTrue(
            $neighborsPoint['ortogonalNeighbors']['south']['point']->equals(
                new Point(0,-1))
        );
        $this->assertTrue(
            $neighborsPoint['diagonalNeighbors']['northWest']['point']->equals(
                new Point(-1,1))
        );
        $this->assertTrue(
            $neighborsPoint['diagonalNeighbors']['northEast']['point']->equals(
                new Point(1,1))
        );
        $this->assertTrue(
            $neighborsPoint['diagonalNeighbors']['southWest']['point']->equals(
                new Point(-1,-1))
        );
        $this->assertTrue(
            $neighborsPoint['diagonalNeighbors']['southEast']['point']->equals(
                new Point(1,-1))
        );
    }

}