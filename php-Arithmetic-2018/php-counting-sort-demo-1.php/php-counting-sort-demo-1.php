<?php
// php-counting-sort-demo-1.php

define('k', 100);

class CountingSortDemo1{
	private $C = array(k);
	function DisplayData($data){
		print join($data, ', ')."\n";
	}

	function CountingSort(&$data){
		$n = sizeof($data);
		for($i = 0; $i < k; $i++){
			$this->C[$i] = 0;
		}
		for($i = 0; $i < $n; $i++){
			$this->C[$data[$i]]++;
		}
		for($i = 1; $i < k; $i++){
			$this->C[$i] += $this->C[$i - 1];
		}
		$B = array($n);
		for($i = $n - 1; $i >= 0; $i--){
			$B[--$this->C[$data[$i]]] = $data[$i];
		}
		for($i = 0; $i < $n; $i++){
			$data[$i] = $B[$i];
		}
	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$csd = new CountingSortDemo1;
$csd->DisplayData($data);
$csd->CountingSort($data);
$csd->DisplayData($data);
?>