<?php

namespace Array\ContainsDuplicate;

/**
 * https://leetcode.com/problems/contains-duplicate/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $countValues = array_count_values($nums);
        $revertData = array_flip($countValues);

        if (count($nums) != count($countValues)) {
            return true;
        } else {
            return count($revertData) == 1 ? false : true;
        }


    }
}