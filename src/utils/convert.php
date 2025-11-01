<?php

/**
 * 座標圧縮
 *
 * @param int[] $nums
 * @param int $start
 * @return int[]
 */
function array_compression(array $nums, int $start = 0): array
{
    if (empty($nums)) {
        return [];
    }
    $a = array_unique($nums);
    sort($a);
    $a = array_flip($a);
    return array_map(fn ($x) => ($a[$x] + $start), $nums);
}
