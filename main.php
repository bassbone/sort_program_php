<?php

ini_set('memory_limit', '1024M');

class StdSort implements Algorithm {
    public function sort(array $list) : array {
        sort($list);
        return $list;
    }
}

class BubbleSort implements Algorithm {
    public function sort(array $list) : array {
        $length = count($list);
        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 1; $j < $length - $i; $j++) {
                if ($list[$j] < $list[$j - 1]) {
                    $tmp = $list[$j];
                    $list[$j] = $list[$j - 1];
                    $list[$j - 1] = $tmp;
                }
            }
        }
        return $list;
    }
}

class SelectionSort implements Algorithm {
    public function sort(array $list) : array {
        $length = count($list);
        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($list[$j] < $list[$min]) {
                    $min = $j;
                }
            }
            $tmp = $list[$i];
            $list[$i] = $list[$min];
            $list[$min] = $tmp;
        }
        return $list;
    }
}

$sort = new Sort(new SelectionSort());

exit;

class Sort{

    const LENGTH = 10000;

    private $list;

    function __construct(Algorithm $sort) {
        $this->init_list();
        //print(implode(',', $this->list).PHP_EOL);

        $time_start = microtime(true);

        $this->list = $sort->sort($this->list);

        $time = microtime(true) - $time_start;
        echo "{$time} 秒".PHP_EOL;
    }

    private function init_list() {
        $this->list = range(1, self::LENGTH);
        shuffle($this->list);
    }
}

interface Algorithm {
    public function sort(array $list) : array;
}


