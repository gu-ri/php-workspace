<?php

/**
 * Binary Indexed Tree (Fenwick Tree)
 *
 * 1-based index
 */
class Bit
{
    private readonly int $size;
    private array $tree;

    /**
     * @param int $n 要素数
     */
    public function __construct(int $n)
    {
        $this->size = $n;
        $this->tree = array_fill(1, $n, 0);
    }

    /**
     * i番目にxを加算
     *
     * @param int $pos 1-based index
     * @param int $x 加算する値
     * @return self
     */
    public function add(int $pos, int $x = 1): self
    {
        while ($pos <= $this->size) {
            $this->tree[$pos] += $x;
            $pos += $pos & -$pos;
        }

        return $this;
    }

    /**
     * 1番目からi番目までの和を取得
     *
     * @param int $pos 1-based index
     * @return int
     */
    public function sum(int $pos): int
    {
        $sum = 0;
        while ($pos > 0) {
            $sum += $this->tree[$pos];
            $pos -= $pos & -$pos;
        }
        return $sum;
    }

    /**
     * @param int $left 1-based index
     * @param int|null $right 1-based index
     * @return int
     */
    public function sum_segment(int $left, ?int $right = null): int
    {
        return $this->sum($right ?? $this->size) - $this->sum($left - 1);
    }

    /**
     * デバッグ用: ツリーの中身を表示
     *
     * @return void
     */
    public function dump_tree(): void
    {
        var_dump($this->tree);
    }
}
