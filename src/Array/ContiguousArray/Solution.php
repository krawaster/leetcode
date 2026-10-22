<?php
namespace Array\ContiguousArray;

// $nums = [0,1,0];
$nums = [1,0];
$max = (new Solution())->findMaxLength($nums);
$stop = 1;

/**
 * https://leetcode.com/problems/contiguous-array/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxLength($nums) {
        $len=count($nums);
        $pref[0] = -1;
        // $pref= [];
        $count = 0;
        $max = 0;
        for($i=0; $i<$len; $i++) {
            $cur = $nums[$i];
            $count += ($nums[$i] == 1 ? 1 : -1);
            if (isset($pref[$count])) {
                $diff = $i-$pref[$count];
                $max = max($max, $i-$pref[$count]);
            } else {
                $pref[$count] = $i;   
            }
        }

        return $max;
    }
}