<?php

/**
 * 配列から指定した値を二分探索で探す
 *
 * @param int[] $array
 * @param int $x
 * @return int|false 見つかった場合はインデックス、見つからなかった場合はfalse
 */
function binary_search(array $array, int $x): int|false
{
    if (empty($array)) {
        return false;
    }

    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = floor(($l + $r) / 2);
        if ($array[$mid] < $x) {
            $l = $mid + 1;
        } else {
            $r = $mid;
        }
    }
    return ($array[$l] === $x) ? $l : false;
}

/**
 * 配列から指定した値以上の最小値を二分探索で探す
 *
 * @param int[] $array
 * @param int $x
 * @return int|false 見つかった場合はインデックス、見つからなかった場合はnull
 */
function binary_search_gte(array $array, int $x): int|false
{
    if (empty($array)) {
        return false;
    }
    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = floor(($l + $r) / 2);
        if ($array[$mid] < $x) {
            $l = $mid + 1;
        } else {
            $r = $mid;
        }
    }
    if ($array[$l] >= $x) {
        return $l;
    }
    return false;
}

/**
 * 配列から指定した値以下の最大値を二分探索で探す
 *
 * @param int[] $array
 * @param int $x
 * @return int|false 見つかった場合はインデックス、見つからなかった場合はnull
 */
function binary_search_lte(array $array, int $x): int|false
{
    if (empty($array)) {
        return false;
    }
    sort($array);
    $l = 0;
    $r = count($array) - 1;
    while ($l < $r) {
        $mid = ceil(($l + $r) / 2);
        if ($array[$mid] > $x) {
            $r = $mid - 1;
        } else {
            $l = $mid;
        }
    }
    if ($array[$l] <= $x) {
        return $l;
    }
    return false;
}
