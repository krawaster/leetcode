<?php

namespace Array\SingleNumber;

/**
 * https://leetcode.com/problems/single-number/
 */
class Solution {
    public function __construct()
    {
        $nums = [2,2,1];
        $result = $this->singleNumber($nums);
    }


    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $result = [];
        for($i=0; $i < count($nums); $i++) {
            if (isset($result[$nums[$i]])) {
                unset($result[$nums[$i]]);
            } else {
                $result[$nums[$i]] = 1;
            }
        }

        return key($result);
    }
}