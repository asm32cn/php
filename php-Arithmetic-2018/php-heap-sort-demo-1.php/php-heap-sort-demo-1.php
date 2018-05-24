<?php
// php-heap-sort-demo-1.php

class HeapSortDemo1{
    function DisplayData($data){
        print join($data, ', ')."\n";
    }

    function HeapSort(&$data){
        $nHeapSize = sizeof($data);
        // BuildHeap
        for($i = $nHeapSize / 2 - 1; $i >= 0; $i--){
            $this->Heapify($data, $i, $nHeapSize);
        }
        // HeapSort
        while($nHeapSize > 1){
            $this->Swap($data, 0, --$nHeapSize);
            $this->Heapify($data, 0, $nHeapSize);
        }
    }

    function Heapify(&$data, $i, $nSize){
        $nLeftChild = 2 * $i + 1;
        $nRightChild = 2 * $i + 2;
        $nMax = $i;
        if($nLeftChild < $nSize && $data[$nLeftChild] > $data[$nMax]){
            $nMax = $nLeftChild;
        }
        if($nRightChild < $nSize && $data[$nRightChild] > $data[$nMax]){
            $nMax = $nRightChild;
        }
        if($nMax != $i){
            $this->Swap($data, $i, $nMax);
            $this->Heapify($data, $nMax, $nSize);
        }
    }

    function Swap(&$data, $i, $j){
        $temp = $data[$i];
        $data[$i] = $data[$j];
        $data[$j] = $temp;
    }
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$hsd = new HeapSortDemo1;
$hsd->DisplayData($data);
$hsd->HeapSort($data);
$hsd->DisplayData($data);

?>