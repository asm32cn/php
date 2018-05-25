<?php
// php-bucket-sort-demo-1.php
define('MAX', 100);
define('bn', 5);
$nFactor = (int)(MAX % bn ? MAX / bn + 1 : MAX / bn);

class BucketSortDemo1{
	private $C = array(bn);

	function DisplayData($data){
		print join($data, ', ')."\n";
	}

	function BucketSort(&$data){
		$n = sizeof($data);
		$this->CountingSort($data);
		for($i = 0; $i < bn; $i++){
			$nLeft = $this->C[$i];
			$nRight = ($i == bn - 1 ? $n - 1 : $this->C[$i + 1] - 1);
			if($nLeft < $nRight){
				$this->InsertionSort($data, $nLeft, $nRight);
			}
		}

	}

	function MapToBucket($x){
		return (int)($x / $GLOBALS['nFactor']);
	}

	function CountingSort(&$data){
		$n = sizeof($data);
		for($i = 0; $i < bn; $i++){
			$this->C[$i] = 0;
		}
		for($i = 0; $i < $n; $i++){
			$this->C[$this->MapToBucket($data[$i])]++;
		}
		for($i = 1; $i < bn; $i++){
			$this->C[$i] += $this->C[$i - 1];
		}
		$B = array($n);
		for($i = $n - 1; $i >= 0; $i--){
			$b = $this->MapToBucket($data[$i]);
			$B[--$this->C[$b]] = $data[$i];
		}
		for($i = 0; $i < $n; $i++){
			$data[$i] = $B[$i];
		}
	}

	function InsertionSort(&$data, $nLeft, $nRight){
		for($i = $nLeft + 1; $i <= $nRight; $i++){
			$nGet = $data[$i];
			$j = $i - 1;
			while($j >= $nLeft && $data[$j] > $nGet){
				$data[$j + 1] = $data[$j];
				$j--;
			}
			$data[$j + 1] = $nGet;
		}
	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$bsd = new BucketSortDemo1;
$bsd->DisplayData($data);
$bsd->BucketSort($data);
$bsd->DisplayData($data);
?>