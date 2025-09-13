<?php

namespace DP\LongestCommonSubsequence;

$text1 = "ezupkr";
$text2 = "ubmrapg";
$result = (new Solution())->longestCommonSubsequence($text1,$text2);
$stop = 1;

class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $result=0;
        $text1 = str_split($text1);
        $text2 = str_split($text2);
        foreach($text1 as $txt1){
            if (isset($t1[$txt1])){
                $t1[$txt1]++;
            } else {
                $t1[$txt1]=1;
            }
        }
        foreach($text2 as $txt2){
            if (isset($t2[$txt2])){
                $t2[$txt2]++;
            } else {
                $t2[$txt2]=1;
            }
        }

        foreach($text1 as $key) {
            if (isset($t2,$key)){
                if ($t2[$key] > 0){
                    $t2[$key]--;
                    $t1[$key]--;
                    $result++;
                }
            }
        }

        foreach($text2 as $key) {
            if (isset($t1,$key)){
                if ($t1[$key] > 0){
                    $t1[$key]--;
                    $t2[$key]--;
                    $result++;
                }
            }
        }

        return $result;

    }
}