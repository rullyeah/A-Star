<?php 
namespace AStar\Test;

use AStar\Domain\Point;
use AStar\Domain\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
    public function testNew()
    {
        $bean = new Cell(new Point(0,0));
        $this->assertInstanceOf(Cell::class, $bean);
    }

    public function testNewCellGIsInfinity()
    {
        $bean = new Cell(new Point(0,0));
        $this->assertEquals(INF, $bean->g());
    }

    public function testNewCellHIsInfinity()
    {
        $bean = new Cell(new Point(0,0));
        $this->assertEquals(INF, $bean->h());
    }

    public function testNewCellFIsInfinity()
    {
        $bean = new Cell(new Point(0,0));
        $this->assertEquals(INF, $bean->f());
    }

    public function testNewCellParentIsNull()
    {
        $bean = new Cell(new Point(0,0));
        $this->assertEquals(null, $bean->parent());
    }

    public function testNewCellPointIsSamePoint()
    {   
        $point = new Point(0,0);
        $bean = new Cell($point);
        $this->assertTrue($point->equals($bean->point()));
    }

    public function testParent()
    {
        $zero = new Cell(new Point (0,0));
        $children = new Cell(new Point (0,1));
        $children->setParent($zero);
        $this->assertEquals($zero, $children->parent());   
    }

    public function testG()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setG(10);
        $this->assertEquals(10, $cell->g());   
    }

    public function testH()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setH(90);
        $this->assertEquals(90, $cell->h());   
    }

    public function testF()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setG(10);
        $cell->setH(90);
        $this->assertEquals(100, $cell->f()); 
    }

    public function testEquals()
    {
        $cell = new Cell(new Point (0,0));
        $this->assertTrue($cell->equals(new Cell(new Point (0,0))));
    }

    public function testRef()
    {
        $cell = new Cell(new Point (0,0));
        $this->assertEquals('0:0',$cell->ref());
    }

    public function testCompareSameF()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setG(10);
        $cell->setH(20);
        $other = new Cell(new Point (0,0));
        $other->setG(20);
        $other->setH(10);
        $this->assertTrue(Cell::compareF($cell, $other) == 0);
    }

    public function testCompareNegativeF()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setG(10);
        $cell->setH(10);
        $other = new Cell(new Point (0,0));
        $other->setG(20);
        $other->setH(10);
        $this->assertTrue(Cell::compareF($cell, $other) < 0);
    }

    public function testComparePositiveF()
    {
        $cell = new Cell(new Point (0,0));
        $cell->setG(10);
        $cell->setH(10);
        $other = new Cell(new Point (0,0));
        $other->setG(5);
        $other->setH(10);
        $this->assertTrue(Cell::compareF($cell, $other) > 0);
    }
}
?>