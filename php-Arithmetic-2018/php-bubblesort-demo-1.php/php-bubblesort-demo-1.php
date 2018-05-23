<?php
// php-bubblesort-demo-1.php
class BubbleSortDemo1{
    function DisplayData($data){
        print join($data, ', ')."\n";
    }

    function BubbleSort(&$data){
        $n = sizeof($data);
        for($j = 0; $j < $n - 1; $j++){
            for($i = 0; $i < $n - 1 - $j; $i++){
                if($data[$i] > $data[$i + 1]){
                    $temp = $data[$i];
                    $data[$i] = $data[$i + 1];
                    $data[$i + 1] = $temp;
                }
            }
        }
    }
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$bsd = new BubbleSortDemo1;
$bsd->DisplayData($data);
$bsd->BubbleSort($data);
$bsd->DisplayData($data);
?>