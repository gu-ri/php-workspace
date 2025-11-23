<?php

use PHPUnit\Framework\TestCase;

require_once('src/utils/dataStructures/Bit.php');

final class BitTest extends TestCase
{
    public function test_bit(): void
    {
        $bit = (new Bit(10))
            ->add(3, 5)
            ->add(5, 2)
            ->add(7, 8);
        $this->assertSame($bit->sum(3), 5);
        $this->assertSame($bit->sum(5), 7);
        $this->assertSame($bit->sum(10), 15);
        $this->assertSame($bit->sum_segment(4, 7), 10);
        $this->assertSame($bit->sum_segment(3, 7), 15);
        $this->assertSame($bit->sum_segment(1), 15);
    }
}
