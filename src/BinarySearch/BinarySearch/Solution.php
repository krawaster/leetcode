<?php

namespace BinarySearch\BinarySearch;

$nums = [-1,0,3,5,9,12];
$target = 9;

// left = 0, right = 5 | (5 - 0)/2  = 2.5 = 2  nums[2] = 3
// left = 2, right = 5 | 2+(5 - 2)/2  = 1 nums[3] = 5
// left = 3, right = 5 | 3+(5 - 3)/2  = 4 nums[4] = 9


(new Solution())->search($nums, $target);

// https://leetcode.com/problems/binary-search/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {

        $left = 0;
        $right = count($nums)-1;

        while($left <= $right) {
//            $mid = (int) ($left + ($right-$left) / 2);
            $mid = (int) (($left + $right) / 2);
            if (isset($nums[$mid]) && $nums[$mid] == $target) {
                return $mid;
            } else if (isset($nums[$mid]) && $nums[$mid] < $target) {
                $left = $mid+1;
            } else {
                $right = $mid - 1;
            }
        }

        return -1;

    }
}