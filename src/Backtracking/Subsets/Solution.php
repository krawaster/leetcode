<?php

namespace Backtracking\Subsets;

$nums = [1,2,3];

(new Solution())->subsets($nums);

/**
 * https://leetcode.com/problems/subsets/
 */
class Solution1 {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $output = [];
        $output[] = [];

        for($i=0;$i<count($nums);$i++){
            $subsets = [];

            foreach($output as $cur) {
                $newData = [$nums[$i]];
                $subsets[] = array_merge($cur, $newData);
            }

            foreach($subsets as $cur) {
                $output[] = $cur;
            }
        }

        return $output;
    }
}
class Solution {

    private $output = [];
    private $n;
    private $k;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->n = count($nums);
        for($this->k=0; $this->k < $this->n + 1; $this->k++){
            $this->backTrack(0, [], $nums);
        }
        return $this->output;
    }

    function backTrack($first, $curr, $nums){
        if (count($curr) == $this->k){
            $this->output[] = $curr;
            return;
        }

        for($i=$first; $i < $this->n; $i++){
            $curr[] = $nums[$i];
            $this->backTrack($i+1, $curr, $nums);
            array_pop($curr);
        }
    }
}