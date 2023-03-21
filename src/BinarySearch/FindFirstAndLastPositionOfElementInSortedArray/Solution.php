<?php

namespace BinarySearch\FindFirstAndLastPositionOfElementInSortedArray;

$nums = [5,7,7,8,8,10];
$target = 8;
(new Solution())->searchRange($nums, $target);

/**
 * https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {

        $first = $this->findElement($nums, $target, true);

        if ($first == -1) {
            return [-1,-1];
        }

        $last = $this->findElement($nums, $target, false);

        return [$first, $last];
    }

    private function findElement($nums, $target, bool $isFirst) {
        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = (int) (($left+$right)/2);
            if ($nums[$mid] == $target) {
                if ($isFirst) {
                    if ($mid == $left || $nums[$mid-1] != $target) {
                        return $mid;
                    }

                    $right = $mid-1;
                } else {
                    if ($mid == $right || $nums[$mid+1] != $target) {
                        return $mid;
                    }

                    $left = $mid + 1;
                }
            } else if ($nums[$mid] > $target){
                $right = $mid-1;
            } else {
                $left = $mid+1;
            }
        }

        return -1;
    }
}