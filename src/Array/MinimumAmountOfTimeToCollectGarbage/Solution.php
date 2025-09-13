<?php

namespace Array\MinimumAmountOfTimeToCollectGarbage;

$garbage = ["G","P","GP","GG"];
$travel = [2,4,3];
(new Solution())->garbageCollection($garbage, $travel);

/**
 * https://leetcode.com/problems/minimum-amount-of-time-to-collect-garbage/description/
 */
class Solution {

    /**
     * @param String[] $garbage
     * @param Integer[] $travel
     * @return Integer
     */
    function garbageCollection($garbage, $travel) {
        $res = [
            'M' => 0,
            'P' => 0,
            'G' => 0
        ];

        array_unshift($travel, 0);
        foreach($travel as $key => $time) {
            foreach($garbage as $gStep) {
                $timeGarb = [];
                for($i=0;$i < strlen($gStep); $i++) {
                    $item = $gStep[$i];
                    $res[$item] += 1;
                    if ($item == "G"){
                        print $item . " = " . $res[$item] . "\n";
                    }
                    $timeGarb[$item] = $item;
                }

                foreach($timeGarb as $item) {
                    //print $item . " = ". $res[$item] ." + " . $time . "\n";
                    $res[$item] = $res[$item] + $time;
                }
            }
        }

        $result = PHP_INT_MAX;
        foreach($res as $gar => $timeRes) {
            if ($timeRes == 0) continue;
            print $gar . " - " . $timeRes . "\n";
            $result = min($timeRes, $result);
        }
        return $result;
    }
}
/**
 * 2 + 1 + 4 + 1  = 8
 * 1 + 2 + 4 + 1 + 3 + 1 + 1 = 13
 * ----------------
 * 1 + 1 + 1 + 3 + 1 = 7
 * 3 + 1 + 10 + 1 = 15
 * 3 + 1 + 10 + 1 = 15
 **/