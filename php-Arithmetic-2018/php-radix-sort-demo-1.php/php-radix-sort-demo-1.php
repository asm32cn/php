<?php
// php-radix-sort-demo-1.php

define('dn', 3);
define('k', 10);
$radix = array(1, 1, 10, 100);

class LsdRedixSortDemo1{
	private $C = array(k);

	function DisplayData($data){
		print join(', ', $data) . "\n";
	}

	function GetDigit($x, $d){
		return (int)($x / $GLOBALS['radix'][$d]) % 10;
	}

	function CountingSort(&$data, $d){
		$n = sizeof($data);

		for($i = 0; $i < k; $i++){
			$this->C[$i] = 0;
		}
		for($i = 0; $i < $n; $i++){
			$this->C[$this->GetDigit($data[$i], $d)]++;
		}
		for($i = 1; $i < k; $i++){
			$this->C[$i] += $this->C[$i - 1];
		}
		$B = array($n);
		for($i = $n - 1; $i >= 0; $i--){
			$digit = $this->GetDigit($data[$i], $d);
			$B[--$this->C[$digit]] = $data[$i];
		}
		for($i = 0; $i < $n; $i++){
			$data[$i] = $B[$i];
		}
	}

	function LsdRedixSort(&$data){
		for($d = 1; $d < dn; $d++){
			$this->CountingSort($data, $d);
		}
	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$lrsd = new LsdRedixSortDemo1;
$lrsd->DisplayData($data);
$lrsd->LsdRedixSort($data);
$lrsd->DisplayData($data);
?>