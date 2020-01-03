<?php
$arr = [3,19,32,43,54,2,4,5,6];

function insertSort($arr){
    $len = count($arr);
    for ($i = 1;$i < $len;$i++){
        for ($j = $i; $j > 0;$j --){
            if($arr[$j] < $arr[$j-1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $temp;
            }
        }
    }
    return $arr;
}
$rst = insertSort($arr);
echo implode(',',$rst);