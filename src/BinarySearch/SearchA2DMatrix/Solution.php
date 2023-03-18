<?php

namespace BinarySearch\SearchA2DMatrix;

$matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]];
$target = 3;
(new Solution())->searchMatrix($matrix, $target);

/**
 * https://leetcode.com/problems/search-a-2d-matrix/
 */
class Solution
{
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $dataValues = [];
        foreach ($matrix as $values) {
            foreach ($values as $value){
                $dataValues[] = $value;
            }
        }

        $left = 0;
        $right = count($dataValues) - 1;

        while($left <= $right){
            $mid = (int) (($right + $left)/2);
            if (isset($dataValues[$mid]) && $dataValues[$mid] == $target){
                return true;
            } elseif (isset($dataValues[$mid]) && $dataValues[$mid] < $target){
                $left = $mid+1;
            } elseif (isset($dataValues[$mid]) && $dataValues[$mid] > $target) {
                $right = $mid-1;
            }
        }
        return false;
    }
}