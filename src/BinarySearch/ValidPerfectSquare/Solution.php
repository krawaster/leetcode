<?php

namespace BinarySearch\ValidPerfectSquare;

$num = 16;
$result = (new Solution())->isPerfectSquare($num);
/**
 * https://leetcode.com/problems/valid-perfect-square/
 */
class Solution {

    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num) {
        if ($num < 2) {
            return true;
        }

        $left = 2;
        $right = $num/2;
        while ($left <= $right) {
            $mid = (int) (($left + $right)/2);
            $result = $mid * $mid;
            if ($result == $num) {
                return true;
            }

            if ($result > $num) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return false;
    }
}