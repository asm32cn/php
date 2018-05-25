<?php
// php-insertion-sort-demo-1.php

class InsertionSortDemo1{
    function DisplayData($data){
        print join($data, ', ')."\n";
    }

    function InsertionSort(&$data){
        $n = sizeof($data);
        for($i = 1; $i < $n; $i++){
            $nGet = $data[$i];
            $j = $i - 1;
            while($j >= 0 && $data[$j] > $nGet){
                $data[$j + 1] = $data[$j];
                $j--;
            }
            $data[$j + 1] = $nGet;
        }
    }
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$isd = new InsertionSortDemo1;
$isd->DisplayData($data);
$isd->InsertionSort($data);
$isd->DisplayData($data);

?>