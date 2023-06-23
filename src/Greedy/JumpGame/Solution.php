<?php

namespace Greedy\JumpGame;

$nums = [2,3,1,1,4];
$result = (new Solution())->canJump($nums);
$stop = true;

/**
 * https://leetcode.com/problems/jump-game/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $jumpTo = 0;
        $i = 0;

        while($jumpTo < count($nums) && $jumpTo >= $i) {
            $countJumps = $nums[$i];
            $jumpTo = max($countJumps+$i, $jumpTo);
            $i++;
        }

        return $jumpTo >= count($nums)-1;
    }
}