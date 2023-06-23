<?php

namespace Intervals\MergeIntervals;

//(new Solution())->merge([[1,3],[2,6],[8,10],[15,18]]);
(new Solution())->merge([[1,4],[4,5]]);
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        $result = [];
        for($i=0; $i < count($intervals); $i++) {
            $start = $intervals[$i][0];
            $end = $intervals[$i][1];
            for($k=$i+1; $k < count($intervals)+1; $k++){
                $nextStart = $intervals[$k][0];
                $nextEnd = $intervals[$k][1];

                if (null !== $nextStart) {
                    if ($nextStart < $end) {
                        $end = $nextEnd;
                    } else {
                        $result[] = [$start, $end];
                        break;
                    }
                } else {
                    $result[] = [$start, $end];
                    break;
                }
            }
        }
        return $result;
    }
}