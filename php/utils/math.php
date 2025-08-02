<?php

function is_prime(int $x): int
{
    for ($i = 2; $i ** 2 <= $x; $i++) {
        if ($x % $i === 0) {
            return false;
        }
    }
    return true;
}

function culc_gcd(int $a, int $b): int
{
    while (true) {
        [$a, $b] = [max($a, $b), min($a, $b)];
        $a %= $b;
        if ($a === 0) {
            return $b;
        }
    }
}
