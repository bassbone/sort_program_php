<?php

namespace myapp;

class MergeSort implements Algorithm {

    use Util;

    public function sort(array $list) : array {
        if (!count($list)) {
            return [];
        } elseif (count($list) == 1) {

        } elseif (count($list) == 2) {
            if ($list[0] > $list[1]) {
                $this->swap($list[0], $list[1]);
                /*
                $tmp = $list[0];
                $list[0] = $list[1];
                $list[1] = $tmp;
                */
            }
        } else {
            $mid_num = $this->mid_point($list);
            $arr1 = $this->sort(array_slice($list, 0, $mid_num));
            $arr2 = $this->sort(array_slice($list, $mid_num));
            $list = $this->set_merge($arr1 , $arr2);
	}
	return $list;
    }

    private function mid_point(array $list) : int {
        return (int)(ceil(count($list) / 2));
    }

    private function set_merge(array $arr1, array $arr2) : array{
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

