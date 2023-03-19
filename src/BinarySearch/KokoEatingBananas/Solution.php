<?php

namespace BinarySearch\KokoEatingBananas;

$piles = [3,6,7,11];
$h = 8;

(new Solution())->minEatingSpeedBinarySearch($piles, $h);

class Solution
{
    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeedBinarySearch($piles, $h) {
        $left = 1;
        $right = max($piles);

        while($left < $right) {
            $middle = (int) (($left+$right )/2);

            $hourSpent = 0;
            foreach ($piles as $pile){
                $hourSpent += ceil( $pile/$middle);
            }

            if ($hourSpent <= $h) {
                $right = $middle;
            } else {
                $left = $middle + 1;
            }
        }

        return $right;
    }
    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeedBruteForce($piles, $h) {
        $speed = 1;
        while(true){
            $hourSpent = 0;

            foreach($piles as $key => $pile) {
                $hourSpent += floor($pile/$speed);
                if ($hourSpent > $h) {
                    break;
                }
            }

            if ($hourSpent <= $h) {
                return $hourSpent;
            } else {
                $speed++;
            }
        }
    }
}