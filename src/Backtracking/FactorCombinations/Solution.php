<?php

namespace Backtracking\FactorCombinations;

$result = (new Solution())->getFactors(12);
$stop = 1;

/**
 * https://leetcode.com/problems/factor-combinations/description/
 */
class Solution
{

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function getFactors($n)
    {
        $answer = [];
        $stack = [];
        $stack[] = $n;

        while($stack){
            $lastFactor = array_pop($stack);
            for($i= $lastFactor ?? 2; $i < $lastFactor/$i ;$i++ ){
                if ($lastFactor % $i === 0){
                    $newFactors = [];
                    $newFactors[] = $i;
                    $newFactors[] = $lastFactor/$i;
                    $stack[] = $newFactors;
                    $answer[] = $newFactors;
                }
            }
        }

        return $answer;
    }
}

class Solution1 {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function getFactors($n) {
        $res = [];
        $this->backtrack($n, $res, [], 2);
        return $res;
    }

    private function backtrack($n, &$res, $temp, $start){
        if ($n === 1){
            if (count($temp) > 1){
                $res[] = $temp;
                return;
            }
        }

        for($i = $start; $i<=$n; $i++){
            if($n%$i === 0){
                $temp[] = $i;
                $this->backtrack($n/$i, $res, $temp, $i);
                array_pop($temp);
            }
        }

    }
}