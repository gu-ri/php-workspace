<?php

use PHPUnit\Framework\TestCase;

require_once('src/utils/combination.php');

final class CombinationTest extends TestCase
{
    public function test_get_all_combinations(): void
    {
        $this->assertEquals(
            get_all_combinations([1, 2, 3]),
            [
                [],
                [1],
                [2],
                [1, 2],
                [3],
                [1, 3],
                [2, 3],
                [1, 2, 3],
            ]
        );

        $this->assertEquals(
            get_all_combinations([]),
            [
                [],
            ]
        );
    }

    public function test_get_all_combination_sums(): void
    {
        $this->assertEquals(
            get_all_combination_sums([1, 2, 3]),
            [0, 1, 2, 3, 3, 4, 5, 6]
        );

        $this->assertEquals(
            get_all_combination_sums([]),
            [0]
        );
    }

    public function test_calc_combination(): void
    {
        $this->assertSame(calc_combination(5, 2), 10);
        $this->assertSame(calc_combination(10, 3), 120);
        $this->assertSame(calc_combination(6, 6), 1);

        $this->assertSame(calc_combination(5, 0), 0);
        $this->assertSame(calc_combination(0, 0), 0);
        $this->assertSame(calc_combination(3, 5), 0);
        $this->assertSame(calc_combination(-5, 2), 0);
    }
}
