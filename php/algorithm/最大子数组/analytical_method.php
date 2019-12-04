<?php
$data_list = [1,-2,3,-8,-4,7,2,-5,8,0,-9,2];
$data_len = count($data_list);

$currSum = 0;
$maxSum = 0;
$string_list = [];

for ($i = 0; $i < $data_len;$i ++){
    $tmpSum = $currSum + $data_list[$i];
    $preSum = $data_list[$i] + intval($data_list[$i - 1]);
    echo "preSum=",$preSum," ","currSum=",$currSum," ","tmpSum=",$tmpSum,"\n";
    if($preSum > $tmpSum){
        $string_list = [];
        $string_list[] =  $data_list[$i];
        $string_list[] =  $data_list[$i - 1];
        $currSum = $preSum;
    }else{
        $currSum =  $tmpSum;
    }
    if($currSum > $maxSum){
        $maxSum = $currSum;
        $string_list[] =  $data_list[$i];
    }

}

var_dump($maxSum);
var_dump($string_list);
//var_dump($max_list);