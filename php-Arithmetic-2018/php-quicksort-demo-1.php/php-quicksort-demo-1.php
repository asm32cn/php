<?php
// php-quicksort-demo-1.php

class QuickSortDemo1{
	function DisplayData($data){
		print join(', ', $data) . "\n";
	}

	function QuickSort(&$data, $nLeft, $nRight){
		if($nLeft < $nRight){
			$nKey = $data[$nLeft];
			$nLow = $nLeft;
			$nHigh = $nRight;
			while($nLow < $nHigh){
				while($nLow < $nHigh && $data[$nHigh] >= $nKey){
					$nHigh--;
				}
				$data[$nLow] = $data[$nHigh];
				while($nLow < $nHigh && $data[$nLow] <= $nKey){
					$nLow++;
				}
				$data[$nHigh] = $data[$nLow];
			}
			$data[$nLow] = $nKey;

			$this->QuickSort($data, $nLeft, $nLow - 1);
			$this->QuickSort($data, $nLow + 1, $nRight);
		}

	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$qsd = new QuickSortDemo1;
$qsd->DisplayData($data);
$qsd->QuickSort($data, 0, sizeof($data) - 1);
$qsd->DisplayData($data);
?>