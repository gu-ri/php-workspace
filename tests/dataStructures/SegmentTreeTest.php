<?php

use PHPUnit\Framework\TestCase;

require_once('src/utils/dataStructures/SegmentTree.php');

final class SegmentTreeTest extends TestCase
{
    public function test_segment_tree()
    {
        $len = 8;
        $tree = new SegmentTree($len);
        $tree->update(3, 16);
        $this->assertEquals(0, $tree->max(4, 7));
        $this->assertEquals(16, $tree->max(1, 3));
        $this->assertEquals(16, $tree->max(1, 8));
        $this->assertEquals(16, $tree->max(3, 3));

        $tree->update(5, 13);
        $this->assertEquals(13, $tree->max(4, 7));
        $this->assertEquals(16, $tree->max(1, 3));
        $this->assertEquals(16, $tree->max(1, 8));
    }

    public function test_segment_tree_exception()
    {
        $this->expectException(InvalidArgumentException::class);
        $tree = new SegmentTree(8);
        $tree->max(5, 3);
    }
}
