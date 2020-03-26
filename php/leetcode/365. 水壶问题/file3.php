<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-02-17
 * Time: 11:02
 */
class Solution {

    public $count = 0;

    /**
     * @param Integer $x
     * @param Integer $y
     * @param Integer $z
     * @return Boolean
     */
    function canMeasureWater($x, $y, $z) {
        if($x+$y<$z) return false;
        $gcd = $this->gcd($x,$y);
        return $gcd == 0 ? true : (fmod($z,$gcd) == 0 ? true:false);

    }

    function gcd($n,$m){
        $this->count ++ ;
        if(!$m) return $n;
        return $this->gcd($m,fmod($m,$n));
    }
}
echo "初始: ".round(memory_get_usage()/1024/1024, 2)."B\n";
$solu = new Solution();
var_dump($solu->gcd(3,5));
var_dump($solu->canMeasureWater(2,6,5));
var_dump($solu->count);
echo "使用: ".round(memory_get_usage()/1024/1024, 2)."B\n";