<?php

namespace myapp;

class StdSort implements Algorithm {

    public function sort(array $list) : array {
        sort($list);
        return $list;
    }
}

