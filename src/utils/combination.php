<?php

/**
 * 配列の全組み合わせを取得
 *
 * @param array $array
 * @return array
 */
function get_all_combinations(array $array): array
{
    $combos = [[]];
    foreach ($array as $x) {
        foreach ($combos as $c) {
            $combos[] = [...$c, $x];
        }
    }
    return $combos;
}

/**
 * 配列の全組み合わせのそれぞれの和を取得
 *
 * @param int[] $array
 * @return array
 */
function get_all_combination_sums(array $array): array
{
    $sums = [0];
    foreach ($array as $x) {
        foreach ($sums as $sum) {
            $sums[] = $sum + $x;
        }
    }
    return $sums;
}

/**
 * 組み合わせの数を計算 (nCr)
 *
 * @param int $n
 * @param int $r
 * @return int
 */
function calc_combination(int $n, int $r): int
{
    if ($n <= 0 || $r <= 0 || $n < $r) {
        return 0;
    }

    $num1 = 1;
    for ($i = 0; $i < $r; $i++) {
        $num1 *= ($n - $i);
    }

    $num2 = 1;
    for ($i = $r; $i >= 1; $i--) {
        $num2 *= $i;
    }

    return intdiv($num1, $num2);
}
