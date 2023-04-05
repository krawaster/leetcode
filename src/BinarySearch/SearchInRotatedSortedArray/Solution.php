<?php

namespace BinarySearch\SearchInRotatedSortedArray;

$nums = [4,5,6,7,0,1,2];
$target = 0;
(new Solution())->search($nums, $target);

/**
 * https://leetcode.com/problems/search-in-rotated-sorted-array/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {

        $left = 0;
        $right = count($nums)-1;
        while($left <= $right){
            $mid = (int) (($left + $right)/2);
            $leftValue = $nums[$left];
            $midValue = $nums[$mid];
            $rightValue = $nums[$right];

            if ($midValue == $target) {
                return $mid;
            } elseif ($midValue >= $leftValue ) {
                if ($target >= $leftValue && $target < $midValue){
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                if ($target <= $rightValue && $target > $midValue){
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return -1;
    }
}