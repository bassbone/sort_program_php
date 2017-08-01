<?php

require_once "vendor/autoload.php";

xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

ini_set('memory_limit', '1024M');

const LENGTH = 1000;

//$sort = new myapp\Sort(new myapp\BubbleSort(), LENGTH);
//$sort = new myapp\Sort(new myapp\SelectionSort(), LENGTH);
//$sort = new myapp\Sort(new myapp\InsertionSort(), LENGTH);
$sort = new myapp\Sort(new myapp\MergeSort(), LENGTH);
$sort = new myapp\Sort(new myapp\QuickSort(), LENGTH);
$sort = new myapp\Sort(new myapp\StdSort(), LENGTH);
$sort = new myapp\Sort(new myapp\MixSort(new myapp\QuickSort()), LENGTH);

exit;

