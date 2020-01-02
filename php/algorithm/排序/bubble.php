<?php
$arr = [3,19,32,43,54,2,4,5,6];
function bubbleSort($arr){
    $len = count($arr);
    for($i = 0; $i < $len;$i++){
        for ($j=0;$j < $len - $i -1;$j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }

    return $arr;
}

$rst = bubbleSort($arr);
echo implode(',',$rst);
