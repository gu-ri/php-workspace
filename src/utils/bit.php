<?php

class Bit
{
    private readonly int $size;
    private array $tree;

    public function __construct(int $n)
    {
        $this->size = $n;
        $this->tree = array_fill(1, $n, 0);
    }

    public function add(int $i, int $x = 1)
    {
        while ($i <= $this->size) {
            $this->tree[$i] += $x;
            $i += $i & -$i;
        }
    }

    public function sum(int $i): int
    {
        $sum = 0;
        while ($i > 0) {
            $sum += $this->tree[$i];
            $i -= $i & -$i;
        }
        return $sum;
    }

    public function sum_segment(int $left, ?int $right = null): int
    {
        return $this->sum($right ?? $this->size) - $this->sum($left);
    }

    public function dump_tree(): void
    {
        var_dump($this->tree);
    }
}
