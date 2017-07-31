<?php

namespace myapp;

class MixSort implements Algorithm {

    private $alg;

    function __construct (Algorithm $alg) {
        $this->alg = $alg;
    }

    public function sort(array $list) : array {
        $mid = (int)(count($list) / 2);
        $arr1 = array_slice($list, 0, $mid);
        $arr2 = array_slice($list, $mid);
        $arr1 = $this->alg->sort($arr1);
        $arr2 = $this->alg->sort($arr2);
        $arr = [];
	while (count($arr1) || count($arr2)) {
            if (count($arr1) == 0) {
                array_push($arr, $arr2);
                $arr2 = [];
            } elseif (count($arr2) == 0) {
                array_push($arr, $arr1);
                $arr1 = [];
            } elseif ($arr1[0] > $arr2[0]) {
                array_push($arr, array_shift($arr2));
            } else{
                array_push($arr, array_shift($arr1));
            }
        }

        return $arr;
    }
}

