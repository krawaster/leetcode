<?php

namespace Array\ValidAnagram;

/**
 * https://leetcode.com/problems/valid-anagram/
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $stringArray = str_split($s.$t);

        foreach($stringArray as $key => $stringValue) {
            if ($key == 0) $result = $stringValue;
            $result ^= $stringValue;
        }

        return $result;

    }
}