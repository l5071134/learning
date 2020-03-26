<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-01-12
 * Time: 11:31
 */

function reverse_string(&$str,$from,$to){
    while ($from < $to){
        $chat = $str{$from};
        $str{$from ++ } = $str{$to};
        $str{$to -- } = $chat;
    }
}

function left_rotate_string(&$str,$m){
    $n = strlen($str);
    $m %= $n;
    reverse_string($str,0,$m-1);
    reverse_string($str,$m,$n -1 );
    reverse_string($str,0,$n - 1);

}

$str = 'abcdef';

left_rotate_string($str,2);
var_dump($str);