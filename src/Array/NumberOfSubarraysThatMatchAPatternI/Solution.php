<?php
/**
 * https://leetcode.com/problems/number-of-subarrays-that-match-a-pattern-i/description/
 */
namespace Array\NumberOfSubarraysThatMatchAPatternI;

$nums = [1,2,3,4,5,6];
$pattern = [1,1];
$res = (new Solution())->countMatchingSubarrays($nums, $pattern);
$stop = 1;

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $pattern
     * @return Integer
     */
    function countMatchingSubarrays($nums, $pattern) {
        $count = 0;
        for($i=0;$i<count($nums)-count($pattern);$i++){
            $match = true;
            for($k=0;$k<count($pattern);$k++) {
                $a = $nums[$i+$k];
                $b = $nums[$i + $k + 1];
                
                if ( ($pattern[$k] == 1 && $a<$b) || 
                    ($pattern[$k] == 0 && $a == $b) ||
                    ($pattern[$k] == -1 && $a > $b)                    
                    ) {
                        $match = false;
                        break;
                }
            }

            if ($match == true) {
                $count++;
            }
        }

        return $count;
    }
}