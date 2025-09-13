<?php

namespace Greedy\JumpGame2;

//$nums = [2,3,1,1,4];
$nums = [1,2,3];
$result = (new Solution())->jump($nums);
$stop = true;

/**
 * https://leetcode.com/problems/jump-game/
 */
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        $jumpTo = count($nums)-1;
        $i = 0;

        while($i <= count($nums)) {
            $countJumps = $nums[$i];
            $jumpTo = min($countJumps+$i, $jumpTo);
            $i++;
        }

        return $jumpTo;
    }
}