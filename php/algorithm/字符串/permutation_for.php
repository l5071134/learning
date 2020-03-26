<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-01-12
 * Time: 11:31
 */

$str = '1224';

function swap(&$str,$i,$j){
    if($i <> $j){
        $chat = $str{$i};
        $str{$i} = $str{$j};
        $str{$j} = $chat;
    }
}

/**
 * 是否交换字符串
 * @param $str
 * @param $char
 */
function is_swap($str,$from,$j){
    $can_swap = true;
    for ($i=$from;$i < $j;$i++){
        if($str{$i} == $str{$j}){
            $can_swap = false;
            break;
        }
    }
    return $can_swap;
}

function permutation(&$str,$from,$to){
    if($from == $to){
        for ($i = 0;$i < $to;$i++){
            echo $str{$i};
        }
        echo PHP_EOL;
        return ;
    }

    for ($j= $from;$j < $to;$j++){
        if(!is_swap($str,$from,$j)){
            continue;
        }
        swap($str,$j,$from);
        permutation($str,$from+1,$to);
        swap($str,$j,$from);
    }
}

permutation($str,0,strlen($str) );