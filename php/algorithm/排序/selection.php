<?php
$arr = [3,19,32,43,54,2,4,5,6];
function selectionSort($arr){
    $len = count($arr);
    for ($i=0;$i<$len - 1;$i++){
        $min_index = $i;
        for ($j = $i+1;$j < $len;$j++){
            if($arr[$min_index] > $arr[$j]){
                $min_index = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$min_index];
        $arr[$min_index] = $temp;
    }

    return $arr;
}

$rst = selectionSort($arr);
echo implode(',',$rst);

