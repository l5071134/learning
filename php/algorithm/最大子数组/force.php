<?php
$data_list = [1,-2,3,-8,-4,7,2,-5,8,0,-9,2];
$data_len = count($data_list);

$maxSum = $data_list[0];
$max_list = [];
$currSum = 0;

for ($i = 0; $i < $data_len;$i ++){
    for ($j = $i;$j < $data_len;$j++){
        $currSum = 0 ;
        $tmp_list = [];
        for ($k = $i ; $k <= $j ;$k++){
            $currSum += $data_list[$k];
            $tmp_list[] = $data_list[$k];
        }
        if($currSum > $maxSum){
            $maxSum = $currSum;
            $max_list = $tmp_list;
        }
    }
}

var_dump($maxSum);
var_dump($max_list);