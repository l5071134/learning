<?php
$data_list = [-10,-2,3,-3,2,5,-8];

$currSum = $data_list[0];
$maxSum = $data_list[0];
$data_len =  count($data_list);
$string_list = [];

for ($i = 1; $i < $data_len;$i ++){
    if($currSum > 0){
        $currSum += $data_list[$i];
    }else{
        $currSum = $data_list[$i];
    }

//    if($currSum > $maxSum){
//         = $currSum;
//    }
    $maxSum = max($maxSum,$currSum);
    var_dump($maxSum);
}

var_dump($maxSum);
var_dump($string_list);
//var_dump($max_list);