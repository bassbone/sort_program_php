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
            $list = $this->merge_sorted_array($arr1 , $arr2);
	}
	return $list;
    }

    private function mid_point(array $list) : int {
        return (int)(ceil(count($list) / 2));
    }
}

