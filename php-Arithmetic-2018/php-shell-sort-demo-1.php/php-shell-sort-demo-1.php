<?php
// php-shell-sort-demo-1.php

class ShellSortDemo1{
	function DisplayData($data){
		print join(', ', $data) . "\n";
	}

	function ShellSort(&$data){
		$n = sizeof($data);
		$h = 0;
		while($h <= $n){
			$h = 3 * $h + 1;
		}
		while($h >= 1){
			for($i = $h; $i < $n; $i++){
				$j = $i - $h;
				$nGet = $data[$i];
				while($j >= 0 && $data[$j] > $nGet){
					$data[$j + $h] = $data[$j];
					$j -= $h;
				}
				$data[$j + $h] = $nGet;
			}
			$h = (int)(($h - 1) / 3);
		}
	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$ssd = new ShellSortDemo1;
$ssd->DisplayData($data);
$ssd->ShellSort($data);
$ssd->DisplayData($data);

?>