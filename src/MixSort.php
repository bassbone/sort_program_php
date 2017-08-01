<?php

namespace myapp;

class MixSort implements Algorithm {

    use Util;
 
    private $alg;

    function __construct (Algorithm $alg) {
        $this->alg = $alg;
    }

    public function sort(array $list) : array {
        $part = [];
        $mid = (int)(count($list) / 2);
        $part[0] = array_slice($list, 0, $mid);
        $part[1] = array_slice($list, $mid);
        $tmp_dir = '/dev/shm/';

        $num_works = 0;
        for ($i = 0; $i < 2; $i++) {
            $pid = pcntl_fork();
            if ($pid) {
                $num_works++;
                continue;
            }
       
            file_put_contents($tmp_dir.getmypid(), implode(',', $this->alg->sort($part[$i])));
            exit;
        }

        $sorted_part = [];
        while ($num_works > 0) {
            $status = null;
            $pid = pcntl_wait($status);
            $shared_file = $tmp_dir.$pid;
            $sorted_part[] = explode(',', file_get_contents($shared_file));
            unlink($shared_file);
            $num_works--;
        }
 
        $arr = $this->merge_sorted_array($sorted_part[0], $sorted_part[1]);

        return $arr;
    }
}

