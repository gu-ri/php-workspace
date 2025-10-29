<?php

function search(array $array, int $x): int|bool
{
    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = floor(($l + $r) / 2);
        if ($array[$mid] < $x) $l = $mid + 1;
        else $r = $mid;
    }
    return ($array[$l] === $x) ? $l : false;
}

function binary_search_gte(array $array, int $x): ?int
{
    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = floor(($l + $r) / 2);
        if ($array[$mid] < $x) $l = $mid + 1;
        else $r = $mid;
    }
    return $l;
}

function binary_search_lte(array $array, int $x): ?int
{
    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = ceil(($l + $r) / 2);
        if ($array[$mid] > $x) $r = $mid - 1;
        else $l = $mid;
    }
    return $l;
}
