<?php
$arr = [43,32,19,3,154,4,5,6,10];

function mergeSort($arr){
    if( count($arr) <= 1){
        return $arr;
    }
    $len = count($arr);
    $midden = floor($len/2);
    $left = array_slice($arr,0,$midden);
    $right = array_slice($arr,$midden);

    return merge(mergeSort($left),mergeSort($right));
}

function merge($left,$right){
    $left_len = count($left);
    $right_len = count($right);

    $left_start = 0;
    $right_start = 0;

    $arr = [];
    while ($left_start < $left_len && $right_start < $right_len){
        $arr[] = $left[$left_start] > $right[$right_start]? $right[$right_start++]:$left[$left_start++];
    }

    while ($left_start < $left_len){
        $arr[] = $left[$left_start++];
    }

    while ($right_start < $right_len){
        $arr[] = $right[$right_start++];
    }
    return $arr;
}

$rst = mergeSort($arr,0,count($arr)-1);

echo implode(',',$rst);























