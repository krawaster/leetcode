<?php
namespace Greedy\GasStation;

$gas = [1,2,3,4,5];
$cost = [3,4,5,1,2];

$res = (new Solution())->canCompleteCircuit($gas, $cost);
$stop = true;

class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        for ($i=0;$i < count($gas);$i++){
            $count = 0;
            $tank = $gas[$i];
            $position = ($i + $count) % count($gas);
            while($count < count($gas) && ($tank - $cost[$position]) >= 0) {
                $count++;
                $tank -= $cost[$position];
                $position = ($i + $count) % count($gas);
                $tank += $gas[$position];
            }

            if ($count == count($cost)){
                return $i;
            }
        }
        return -1;
    }
}