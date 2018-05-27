<?php
// php-merge-sort-demo-1.php

class MergeSortDemo1{
	function DisplayData($data){
		print join($data, ', ') . "\n";
	}

	function Merge(&$data, $nLeft, $nMid, $nRight){
		$nLen = $nRight - $nLeft + 1;
		$temp = array($nLen);
		$nIndex = 0;
		$i = $nLeft;
		$j = $nMid + 1;
		while($i <= $nMid && $j <= $nRight){
			$temp[$nIndex++] = $data[$i] <= $data[$j] ? $data[$i++] : $data[$j++];
		}
		while($i <= $nMid){
			$temp[$nIndex++] = $data[$i++];
		}
		while($j <= $nRight){
			$temp[$nIndex++] = $data[$j++];
		}
		for($k = 0; $k < $nLen; $k++){
			$data[$nLeft++] = $temp[$k];
		}
	}

	// 递归实现的归并排序(自顶向下)
	function MergeSortRecursion(&$data, $nLeft, $nRight){
		// 当待排序的序列长度为1时，递归开始回溯，进行merge操作
		if($nLeft == $nRight) return;

		$nMid = (int)(($nLeft + $nRight) / 2);
		$this->MergeSortRecursion($data, $nLeft, $nMid);
		$this->MergeSortRecursion($data, $nMid + 1, $nRight);
		$this->Merge($data, $nLeft, $nMid, $nRight);
	}

	// 非递归(迭代)实现的归并排序(自底向上)
	function MergeSortIteration(&$data){
		// 子数组索引，前一个为A[left ... mid]，后一个为A[mid + 1 ... right]
		$n = sizeof($data);
		// 子数组的大小i初始为1，没轮翻倍
		for($i = 1; $i < $n; $i++){
			$nLeft = 0;
			// 后一个子数组存在(需要归并)
			while($nLeft + $i < $n){
				$nMid = $nLeft + $i - 1;
				// 后一个子数组大小可能不够
				$nRight = $nMid + $i < $n ? $nMid + $i : $n - 1;
				$this->Merge($data, $nLeft, $nMid, $nRight);
				// 前一个子数组索引向后移动
				$nLeft = $nRight + 1;
			}
		}
	}
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data1 = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);
$data2 = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$msd = new MergeSortDemo1;
$msd->DisplayData($data1);
$msd->MergeSortRecursion($data1, 0, sizeof($data1) - 1);
$msd->DisplayData($data1);

print "\n";
$msd->DisplayData($data2);
$msd->MergeSortIteration($data2);
$msd->DisplayData($data2);

?>