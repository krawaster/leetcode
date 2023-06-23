<?php

namespace Greedy\MaximumSubarray;

$nums = [-2,1,-3,4,-1,2,1,-5,4];
$result = (new Solution())->maxSubArray($nums);
$stop = true;
/**
 * https://leetcode.com/problems/maximum-subarray/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $res = PHP_INT_MIN;
        $cur = PHP_INT_MIN;
        for($i=0; $i < count($nums); $i++) {
            $cur = max($cur + $nums[$i], $nums[$i]);
            $res = max($res, $cur);
        }

        return $res;
    }
}