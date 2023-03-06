<?php

namespace Array\TwoSum;

/**
 * https://leetcode.com/problems/two-sum/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach($nums as $key => $value) {
            unset($nums[$key]);
            $secondValue = array_search($target - $value, $nums);
            if (false === $secondValue) {
                continue;
            }

            return [$key, $secondValue];
        }
    }
}