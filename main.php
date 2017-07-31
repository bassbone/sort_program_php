<?php

require_once('class.php');

ini_set('memory_limit', '1024M');

const LENGTH = 1000;

$sort = new Sort(new BubbleSort(), LENGTH);
$sort = new Sort(new SelectionSort(), LENGTH);
$sort = new Sort(new InsertionSort(), LENGTH);
$sort = new Sort(new MergeSort(), LENGTH);
$sort = new Sort(new QuickSort(), LENGTH);
$sort = new Sort(new StdSort(), LENGTH);

exit;

