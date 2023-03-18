<?php

namespace BinarySearch\SqrtX;

$x = 8;

// 1 2 3 4  5  6  7  8  9
// 1 4 9 16 25 36 49 64 81
// 9 / 4.5 / 2.25

$value = (new Solution())->mySqrt($x);

/**
 * https://leetcode.com/problems/sqrtx/
 **/
class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if ($x == 1) {
            return $x;
        }

        $left = 0;
        $right = $x/2;
        $result = 0;
        while ($left <= $right){
            $mid = (int) (($right+$left)/2);
            $sqrt = $mid*$mid;
            if($sqrt === $x){
                return $mid;
            } else if($sqrt < $x) {
                $left = $mid + 1;
                $result = $mid;
            } elseif ($sqrt > $x) {
                $right = $mid - 1;
            }
        }

        return $result;
    }
}