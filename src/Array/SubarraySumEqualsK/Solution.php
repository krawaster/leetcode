<?php 
namespace Array\SubarraySumEqualsK;

$nums = [1,2,3];
$k = 3;
(new Solution())->subarraySum($nums, $k);
/**
 * https://leetcode.com/problems/subarray-sum-equals-k/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k) {
        $len = count($nums);
        
        $r=count($nums)-1;

        $res=0;
        for($i=0; $i<$len; $i++) {
            $l=$i+1;
            if ($nums[$i] == $k) {            
                $res++;
            }

            $sum = $nums[$i];
            while($l <= $r) {
                $sum += $nums[$l];
                if ($sum == $k) {
                    $res++;
                } 

                $l++;
            }
        }

        return $res;
    }
}