<?php

class Sort{

    private $list;
    private $length;
    private $debug_mode = false;

    function __construct(Algorithm $sort, int $length) {

        $this->length = $length;
        $this->debug_mode = ($this->length <= 100);

        $this->init_list();
        $this->debug_mode && print(implode(',', $this->list).PHP_EOL);

        $time_start = microtime(true);

        $this->list = $sort->sort($this->list);
        $this->debug_mode && print(implode(',', $this->list).PHP_EOL);

        $time = microtime(true) - $time_start;
        echo "{$time} 秒".PHP_EOL;
    }

    private function init_list() {
        $this->list = range(1, $this->length);
        shuffle($this->list);
    }
}

interface Algorithm {
    public function sort(array $list) : array;
}

trait Util {
    private function swap(&$val1, &$val2) {
        $tmp = $val1;
        $val1 = $val2;
        $val2 = $tmp;
    }
}

class StdSort implements Algorithm {

    public function sort(array $list) : array {
        sort($list);
        return $list;
    }
}

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

