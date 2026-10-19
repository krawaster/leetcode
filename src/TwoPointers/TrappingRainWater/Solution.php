<?php 
namespace TwoPointers\TrappingRainWater;


$height = [0,1,0,2,1,0,1,3,2,1,2,1];
$result = (new Solution())->trap($height);
$stop = 1;

/*
 * https://leetcode.com/problems/trapping-rain-water/description/
 */
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $len=count($height);
        $l=0;
        $r=$len-1;
        $result = 0;
        $lMax=0;
        $rMax=0;
        while($l<$r) {
            $leftH = $height[$l];
            $rightH = $height[$r];
            if ($height[$l] < $height[$r]) {
                $lMax = max($lMax, $height[$l]);
                $lDelta = $lMax-$height[$l];
                $result += $lMax-$height[$l];
                $l++;
            } else {
                $rMax = max($rMax, $height[$r]);
                $rDelta = $rMax-$height[$r];
                $result += $rMax-$height[$r];
                $r--;
            }
        }

        return $result;
    }
}

/**
 * index 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
 * data [0, 1, 0, 2, 1, 0, 1, 3, 2, 1,  2, 1 ]
 *                         l  r              
 *                                           
 * res         1     1  2  1        1               
 */