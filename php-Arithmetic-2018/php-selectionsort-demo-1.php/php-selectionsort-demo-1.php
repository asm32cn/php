<?php
// php-selectionsort-demo-1.php

class SelectionSortDemo1{
    function DisplayData($data){
        print join(', ', $data) . "\n";
    }

    function SelectionSort(&$data){
        $n = sizeof($data);
        for($i = 0; $i < $n - 1; $i++){
            $nMin = $i;
            for($j = $i + 1; $j < $n; $j++){
                if($data[$j] < $data[$nMin]){
                    $nMin = $j;
                }
            }
            if($nMin != $i){
                $temp = $data[$nMin];
                $data[$nMin] = $data[$i];
                $data[$i] = $temp;
            }
        }
    }
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$ssd = new SelectionSortDemo1;
$ssd->DisplayData($data);
$ssd->SelectionSort($data);
$ssd->DisplayData($data);
?>