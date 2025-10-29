<?php

function array_compression(array $array, int $start = 1): array {
    $a = array_unique($array);
    sort($a);
    $a = array_flip($a);
    return array_map(fn($x) => ($a[$x] + $start), $array);
}
