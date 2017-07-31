<?php

namespace myapp;

class BubbleSort implements Algorithm {

    use Util;

    public function sort(array $list) : array {
        $length = count($list);
        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 1; $j < $length - $i; $j++) {
                if ($list[$j] < $list[$j - 1]) {
                    $this->swap($list[$j], $list[$j - 1]);
                }
            }
        }
        return $list;
    }
}

