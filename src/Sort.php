<?php

namespace myapp;

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
        echo get_class($sort).sprintf(':%.5f 秒', $time).PHP_EOL;
    }

    private function init_list() {
        $this->list = range(1, $this->length);
        shuffle($this->list);
    }
}

