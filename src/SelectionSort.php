<?php

namespace myapp;

class SelectionSort implements Algorithm {

    use Util;

    public function sort(array $list) : array {
        $length = count($list);
        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($list[$j] < $list[$min]) {
                    $min = $j;
                }
            }
            $this->swap($list[$i], $list[$min]);
        }
        return $list;
    }
}

