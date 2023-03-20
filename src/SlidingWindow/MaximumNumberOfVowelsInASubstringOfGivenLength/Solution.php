<?php

namespace SlidingWindow\MaximumNumberOfVowelsInASubstringOfGivenLength;

$s = "abciiidef";
$k = 3;
//$result = (new Solution())->maxVowels($s, $k);
$result = (new Solution())->parsePage();
$stopHere = true;

/**
 * https://leetcode.com/problems/maximum-number-of-vowels-in-a-substring-of-given-length/
 */
class Solution
{

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k) {
        $vowels = [
            'a' => 'a',
            'e' => 'e',
            'i' => 'i',
            'o' => 'o',
            'u' => 'u',
        ];

        $countVowels = 0;
        $hashMap = [];
        $maxCountVowels = 0;

        for($right = 0; $right < strlen($s);$right++){
            $current = $s[$right];
            $hashMap[] = $current;
            if (isset($vowels[$current])){
                $countVowels++;
            }

            if (count($hashMap) == $k) {
                if ($countVowels > $maxCountVowels) {
                    $maxCountVowels = $countVowels;
                }

                $popedLetter = array_shift($hashMap);
                if (in_array($popedLetter, $vowels)) {
                    $countVowels--;
                }
            }
        }

        return $maxCountVowels;
    }
}