<?php
$data_list = [5,6,7,0,1,2,3,4];

$high = count($data_list) -1;
$low = 0;

while ($low < $high){
    echo $low , " " ,$high,"\n";
    $middle = intval(($high + $low)/2);
    if($data_list[$high] < $data_list[$middle]){
        $low = $middle + 1;
    }

    if($data_list[$middle] < $data_list[$high]){
        $high = $middle;
    }
}
var_dump($data_list[$low]);


