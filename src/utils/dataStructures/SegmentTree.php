<?php

class SegmentTree
{
    private int $size;
    /** @var int[] */
    private array $tree;

    /**
     * @param int $n 要素数
     */
    public function __construct(int $n)
    {
        $size = 1;
        while ($size < $n) $size *= 2;
        $this->size = $size;
        $this->tree = array_fill(1, ($this->size * 2) - 1, 0);
    }

    /**
     * @param int $pos 更新する位置 (1-based index)
     * @param int $value 更新後の値
     * @return void
     */
    public function update(int $pos, int $value)
    {
        $index = $pos + $this->size - 1;
        $this->tree[$index] = $value;
        while ($index >= 2) {
            $index = intdiv($index, 2);
            $left = $index * 2;
            $right = $left + 1;
            $this->tree[$index] = max($this->tree[$left], $this->tree[$right]);
        }
    }

    /**
     * @param int $left 開始位置 (以上)
     * @param int $right 終了位置 (以下)
     * @return int 最大値 (区間外は `PHP_INT_MIN`)
     */
    public function max(int $left, int $right): int
    {
        if ($left > $right) throw new InvalidArgumentException('left must be less than or equal to right');

        return $this->query($left, $right + 1, 1, $this->size + 1, 1);
    }

    /**
     * @param int $left
     * @param int $right
     * @param int $pos_left
     * @param int $pos_right
     * @param int $pos
     * @return int
     */
    private function query(int $left, int $right, int $pos_left, int $pos_right, int $pos): int
    {
        if ($right <= $pos_left || $pos_right <= $left) return PHP_INT_MIN;
        if ($left <= $pos_left && $pos_right <= $right) return $this->tree[$pos];

        $pos_middle = intdiv(($pos_left + $pos_right), 2);
        $left_max = $this->query($left, $right, $pos_left, $pos_middle, $pos * 2);
        $right_max = $this->query($left, $right, $pos_middle, $pos_right, $pos * 2 + 1);
        return max($left_max, $right_max);
    }
}
