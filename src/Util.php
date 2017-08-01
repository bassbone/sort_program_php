<?php

namespace myapp;

trait Util {
    private function swap(&$val1, &$val2) {
        $tmp = $val1;
        $val1 = $val2;
        $val2 = $tmp;
    }

    private function merge_sorted_array(array $arr1, array $arr2) : array{
	$arr = [];
	while (count($arr1) || count($arr2)) {
            if (count($arr1) == 0) {
                array_push($arr, array_shift($arr2));
            } elseif (count($arr2) == 0) {
                array_push($arr, array_shift($arr1));
            } elseif($arr1[0] > $arr2[0]) {
                array_push($arr, array_shift($arr2));
            } else{
                array_push($arr, array_shift($arr1));
            }
        }
	return $arr;
    }
}

