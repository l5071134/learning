<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-01-20
 * Time: 14:28
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if(strlen($s) <=0){
            return 0;
        }
        $max = 1;
        $temp_list = [];
        $cur_max = 1;
        $temp_list[] = $s{0};
        for($i=1;$i < strlen($s);$i++){
            while(in_array($s{$i},$temp_list)){
                array_shift($temp_list);
            }
            $temp_list[] = $s{$i};
            $cur_max = count($temp_list);
            $max = max($max,$cur_max);
        }
        return $max;
    }
}