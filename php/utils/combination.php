<?php

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

function culc_combination(int $n, int $r): int
{
    if ($n <= 0 || $r <= 0 || $n < $r) return 0;

    $num1 = 1;
    for ($i = 0; $i < $r; $i++) $num1 *= ($n - $i);

    $num2 = 1;
    for ($i = $r; $i >= 1; $i--) $num2 *= $i;

    return intdiv($num1, $num2);
}
