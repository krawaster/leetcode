<?php

namespace Graphs\WallsAndGates;

$rooms = [
    [2147483647,-1,0,2147483647],
    [2147483647,2147483647,2147483647,-1],
    [2147483647,-1,2147483647,-1],
    [0,-1,2147483647,2147483647]
];

(new Solution())->wallsAndGates($rooms);

/**
 * https://leetcode.com/problems/walls-and-gates/
 */
class Solution {

    /**
     * @param Integer[][] $rooms
     * @return NULL
     */
    function wallsAndGates(&$rooms) {
        $dir = [
            [1,0],
            [-1,0],
            [0,1],
            [0,-1],
        ];

        $gates = [];
        for($x=0; $x<count($rooms);$x++){
            for($y=0; $y<count($rooms[0]);$y++) {
                if ($rooms[$x][$y] == 0) {
                    $gates[] = [$x,$y];
                }
            }
        }

        while($gates) {
            $lengh = count($gates);
            while($lengh-- > 0) {
                $cur = array_shift($gates);
                $curX = $cur[0];
                $curY = $cur[1];

                foreach($dir as $dirValue) {
                    $x = $dirValue[0] + $curX;
                    $y = $dirValue[1] + $curY;

                    if ($x  < 0 || $y < 0 || $x >= count($rooms) || $y >= count($rooms[0]) || $rooms[$x][$y] != 2147483647) {
                        continue;
                    }

                    $rooms[$x][$y] = $rooms[$curX][$curY]+1;
                    $gates[] = [$x,$y];
                }
            }
        }
    }
}