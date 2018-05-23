<?php
// php-cocktailsort-demo-1.php
class CocktailSortDemo1{
    function DisplayData($data){
        print join($data, ', ')."\n";
    }

    function Swap(&$data, $i, $j){
        $temp = $data[$i];
        $data[$i] = $data[$j];
        $data[$j] = $temp;
    }

    function CocktailSort(&$data){
        $nLeft = 0;
        $nRight = sizeof($data) - 1;
        while($nLeft < $nRight){
            for($i = $nLeft; $i < $nRight; $i++){
                if($data[$i] > $data[$i + 1]){
                    $this->Swap($data, $i, $i + 1);
                }
            }
            $nRight--;
            for($i = $nRight; $i > $nLeft; $i--){
                if($data[$i - 1] > $data[$i]){
                    $this->Swap($data, $i - 1, $i);
                }
            }
            $nLeft++;
        }
    }
}

// $data = array(41, 67, 34, 0, 69, 24, 78, 58, 62, 64, 5, 45, 81, 27, 61, 91, 95, 42, 27, 36);
$data = array(76, 11, 11, 43, 78, 35, 39, 27, 16, 55, 1, 41, 24, 19, 54, 7, 78, 69, 65, 82);

$csd = new CocktailSortDemo1;
$csd->DisplayData($data);
$csd->CocktailSort($data);
$csd->DisplayData($data);
?>