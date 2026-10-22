<?php 
namespace Array\SubarraySumEqualsK;

// $nums = [1,2,3];
//$nums = [-2, 1, 2, -2, 5, -2, 1];
//$nums = [1, 2, 1, 2, 1, 2, 1];
$nums = [1];
$k = 0;
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
        $sumCounts = [0 => 1];

        $count = 0;
        $sum = 0;
        $len = count($nums);

        for ($i = 0; $i < $len; $i = $i + 1) {
            $cur = $nums[$i];
            $sum = $sum + $nums[$i];

            $diff = $sum - $k;

            if (isset($sumCounts[$diff])) {
                $count = $count + $sumCounts[$diff];
            }

            if (isset($sumCounts[$sum])) {
                $sumCounts[$sum] = $sumCounts[$sum] + 1;
            } else {
                $sumCounts[$sum] = 1;
            }
        }

        return $count;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySumBrutforce($nums, $k) {
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