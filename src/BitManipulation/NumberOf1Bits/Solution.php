<?php

namespace BitManipulation\NumberOf1Bits;

$n = 00000000000000000000000000001011;
(new Solution())->hammingWeight($n);
class Solution {
    function hammingWeight($n) {
        $count = 0;
        while ($n != 0) {
            $dec = decbin($n);
            if ($n & 1 == 1) {
                $count++;
            }
            $n = $n >> 1;
        }
        return $count;
    }
}