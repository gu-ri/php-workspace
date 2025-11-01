<?php

use PHPUnit\Framework\TestCase;

require_once('src/utils/binary_search.php');

final class BinarySearchTest extends TestCase
{
    public function test_binary_search(): void
    {
        $this->assertSame(binary_search([1, 2, 3, 4, 5], 3), 2);
        $this->assertSame(binary_search([10, 20, 30, 40, 50], 10), 0);
        $this->assertSame(binary_search([10, 20, 30, 40, 50], 50), 4);
        $this->assertSame(binary_search([5, 15, 25, 35, 45], 100), false);
        $this->assertSame(binary_search([5, 15, 25, 35, 45], 1), false);
        $this->assertSame(binary_search([], 1), false);
    }

    public function test_binary_search_gte(): void
    {
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], -10), 0);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 0), 0);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 1), 0);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 3), 1);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 13), 4);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 99), 5);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 100), 5);
        $this->assertSame(binary_search_gte([1, 3, 5, 10, 20, 100], 101), false);
        $this->assertSame(binary_search_gte([], 1), false);
    }

    public function test_binary_search_lte(): void
    {
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], -10), false);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 0), false);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 1), 0);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 3), 1);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 13), 3);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 99), 4);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 100), 5);
        $this->assertSame(binary_search_lte([1, 3, 5, 10, 20, 100], 101), 5);
        $this->assertSame(binary_search_lte([], 1), false);
    }
}
