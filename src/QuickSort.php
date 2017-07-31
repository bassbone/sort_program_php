<?php

namespace myapp;

class QuickSort implements Algorithm {

    use Util;

    public function sort(array $list) : array {
        $this->sort_sub(0, count($list) - 1, $list);
        return $list;
    }

    private function sort_sub(int $bottom = 0, int $top, array &$list) {
        if ($bottom >= $top) {
            return;
        }

        $div = $list[$bottom];

        for ($lower = $bottom, $upper = $top; $lower < $upper;) {
            while ($lower <= $upper && $list[$lower] <= $div) {
                $lower++;
            }
            while ($lower <= $upper && $list[$upper] > $div) {
                $upper--;
            }
            if ($lower < $upper) {
                $this->swap($list[$lower], $list[$upper]);
            }

        }
        $this->swap($list[$bottom], $list[$upper]);

        $this->sort_sub($bottom, $upper - 1, $list);
        $this->sort_sub($upper + 1, $top, $list);
    }
}

