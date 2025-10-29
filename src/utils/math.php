<?php

function is_prime(int $x): bool
{
    if ($x === 1) return false;

    for ($i = 2; $i ** 2 <= $x; $i++) {
        if ($x % $i === 0) {
            return false;
        }
    }
    return true;
}

function calc_gcd(int $a, int $b): int
{
    while (true) {
        [$a, $b] = [max($a, $b), min($a, $b)];
        $a %= $b;
        if ($a === 0) {
            return $b;
        }
    }
}

function calc_factorial(int $n): int|null
{
    if ($n < 0) return null;

    $num = 1;
    for ($i = $n; $i >= 1; $i--) $num *= $i;
    return $num;
}
