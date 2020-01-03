<?php
$arr = [3,19,32,43,154,12,4,5,6];

function shellSort($arr){
    $len = count($arr);
    for ($k = floor($len/2);$k > 0;$k = floor($k/2)){
        for ($i=0;$i<$len - $k;$i++){
            if($arr[$i] > $arr[$i + $k]){
                $temp = $arr[$i];
                $arr[$i] =  $arr[$i + $k];
                $arr[$i + $k] = $temp;
            }
        }
        echo $k . PHP_EOL;
    }
    return $arr;
}
$rst = shellSort($arr);
echo implode(',',$rst);