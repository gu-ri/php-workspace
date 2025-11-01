<?php
use PHPUnit\Framework\TestCase;

require_once('src/utils/math.php');

final class MathTest extends TestCase
{
    public function test_is_prime(): void
    {
        $this->assertTrue(
            array_all(
                [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97],
                fn($x) => is_prime($x)
            )
        );
        $this->assertTrue(is_prime(67280421310721));

        $this->assertFalse(is_prime(123));
        $this->assertFalse(is_prime(16));
        $this->assertFalse(is_prime(1));
        $this->assertFalse(is_prime(0));
        $this->assertFalse(is_prime(-2));
        $this->assertFalse(is_prime(PHP_INT_MIN));
    }

    public function test_calc_gcd(): void
    {
        $this->assertSame(calc_gcd(3, 5), 1);
        $this->assertSame(calc_gcd(5, 25), 5);
        $this->assertSame(calc_gcd(333, 57), 3);
        $this->assertSame(calc_gcd(2394802938, 38823888), 6);

        $this->assertSame(calc_gcd(0, 0), 0);
        $this->assertSame(calc_gcd(0, 7), 7);
        $this->assertSame(calc_gcd(7, 0), 7);
        $this->assertSame(calc_gcd(0, -7), 7);
        $this->assertSame(calc_gcd(-7, 0), 7);
        $this->assertSame(calc_gcd(-7, -7), 7);
    }

    public function test_calc_fuctorial():void
    {
        $this->assertSame(calc_factorial(1), 1);
        $this->assertSame(calc_factorial(2), 2);
        $this->assertSame(calc_factorial(3), 6);
        $this->assertSame(calc_factorial(10), 3628800);
        $this->assertSame(calc_factorial(15), 1307674368000);

        $this->assertSame(calc_factorial(0), 1);
        $this->assertSame(calc_factorial(-10), null);
    }
}
