<?php

/**
 * 素数判定
 *
 * @param int $x
 * @return bool
 */
function is_prime(int $x): bool
{
    if ($x <= 1) {
        return false;
    }

    for ($i = 2; $i ** 2 <= $x; $i++) {
        if ($x % $i === 0) {
            return false;
        }
    }
    return true;
}

/**
 * 最大公約数を計算
 *
 * @param int $a
 * @param int $b
 * @return int
 */
function calc_gcd(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);

    if ($a === 0) {
        return $b;
    } elseif ($b === 0) {
        return $a;
    }

    while (true) {
        if ($a < $b) {
            [$a, $b] = [$b, $a];
        }
        $a %= $b;
        if ($a === 0) {
            return $b;
        }
    }
}

/**
 * 階乗を計算
 *
 * @param int $n
 * @return int|null
 */
function calc_factorial(int $n): ?int
{
    if ($n < 0) {
        return null;
    }

    $num = 1;
    for ($i = $n; $i >= 1; $i--) {
        $num *= $i;
    }
    return $num;
}
