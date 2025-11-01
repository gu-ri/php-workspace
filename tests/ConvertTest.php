<?php
use PHPUnit\Framework\TestCase;

require_once('src/utils/convert.php');

final class ConvertTest extends TestCase
{
    public function test_array_compression(): void
    {
        $this->assertEquals(
            array_compression([0, 50, 10, 1000]),
            [0, 2, 1, 3]
        );
        $this->assertEquals(
            array_compression([-2, -1, 0, 1, 2, 3]),
            [0, 1, 2, 3, 4, 5]
        );
        $this->assertEquals(
            array_compression([3, 2, 1, 0, -1, -2]),
            [5, 4, 3, 2, 1, 0]
        );
        $this->assertEquals(
            array_compression([1, 3, 5, 23, 2, 1]),
            [0, 2, 3, 4, 1, 0]
        );

        $this->assertEquals(
            array_compression([1, 3, 5, 23, 2, 1], 1),
            [1, 3, 4, 5, 2, 1]
        );
        $this->assertEquals(
            array_compression([1, 3, 5, 23, 2, 1], -1),
            [-1, 1, 2, 3, 0, -1]
        );
    }
}
