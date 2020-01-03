<?php
$data_list = [1,-2,3,-8,-4,7,2,-5,8,0,-9,2];

function maxSubArr($list,$form,$to){
    if($form == $to ){
        return $list[$form];
    }

    $middle = intval(($form + $to ) / 2);
    echo $form,"  ",$to," ",$middle,"\n";
    $m1 = maxSubArr($list,$form,$middle);
    $m2 = maxSubArr($list,$middle+1,$to);

    $left = $init_left = $list[$middle-1];

    for ($i = $middle-2; $i >= $form;$i--){
        $init_left += $list[$i];
        $left = max($left,$init_left);
    }

    $right = $init_right = $list[$middle];

    for ($i = $middle+1; $i < $to;$i++){
        $init_right += $list[$i];
        $right = max($right,$init_right);
    }

    $m3 = $left + $right;

    return max($m1,$m2,$m3);
}

var_dump( maxSubArr($data_list,0,count($data_list)));