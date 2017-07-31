<?php

namespace myapp;

class InsertionSort implements Algorithm {

    public function sort(array $list) : array {
        $length = count($list);
        for ($i = 1; $i < $length; $i++) {
            $tmp = $list[$i];
            if ($list[$i - 1] > $tmp) {
                $j = $i;
                do {
                    $list[$j] = $list[$j - 1];
                    $j--;
                } while ($j > 0 && $list[$j - 1] > $tmp);
                $list[$j] = $tmp;
            }
        }
        return $list;
    }
}

