<?php

namespace SlidingWindow\minimumWindowSubstring;

/**
 * https://leetcode.com/problems/minimum-window-substring/description/
 */
class Solution
{
    public function __construct()
    {
        $s = "ADOBECODEBANC";
        $t = "ABC";
        $result = $this->minWindow($s, $t);
//        $result = $this->minWindowExample($s, $t);
    }


    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        if (empty($s) || empty($t) || strlen($s) < strlen($t)){
            return "";
        }

        if ($s == $t) {
            return $s;
        }
        $need = [];
        for($i=0; $i < strlen($t);$i++){
            if (isset($need[$t[$i]])){
                $need[$t[$i]]++;
            } else {
                $need[$t[$i]] = 1;
            }
        }

        $right = 0;
        $left = 0;

        $have = [];
        $needMatch = count($need);
        $countMatch = 0;
        $min = PHP_INT_MAX;
        $res = "";

        while ($right < strlen($s)) {
            $s_right = $s[$right];

            if (isset($have[$s_right])) {
                $have[$s_right]++;
            } else {
                $have[$s_right] = 1;
            }

            if ($have[$s_right] == $need[$s_right]) {
                $countMatch++;
            }

            while ($countMatch >= $needMatch) {
                $res_lenght = $right - $left + 1;

                if ($res_lenght < $min) {
                    $min = $res_lenght;
                    $res = substr($s, $left, $min);
                }

                $s_left = $s[$left];

                $have[$s_left]--;
                if ($have[$s_left] == $need[$s_left] - 1) {
                    $countMatch--;
                }

                $left++;
            }

            $right++;
        }
        return $res;
    }

    /**
     * @param String $s * @param String $t
     * @return String
     */
    function minWindowExample($s, $t) {
        $len_s = strlen($s);
        $len_t = strlen($t);
        if($s == $t){
            return $t;
        } else if( empty($s) || empty($t) || $len_s<$len_t ) {
            return '';
        } else {
            $res = '';
        }
        $have = $need = array();
        $left = $right = $match = 0;
        for ($i = 0; $i < $len_t; $i++) {
                $need[$t[$i]]++;
        }

        $need_match = count($need);
        $min = PHP_INT_MAX;
        while ($right < $len_s) {
            $r_str = $s[$right];
            if (isset($have[$r_str])) {
                $have[$r_str]++;
            } else {
                $have[$r_str] = 1;
            }

            if ($have[$r_str] == $need[$r_str]) {
                $match++;
            }

            while ($match >= $need_match) {
                $res_len = $right - $left + 1;
                if ($res_len < $min) {
                    $min = $res_len;
                    $res = substr($s, $left, $min);
                }

                $l_str = $s[$left];
                $have[$l_str]--;

                if ($have[$l_str] == $need[$l_str] - 1) {
                    $match--;
                }

                $left++;
            }

            $right++;
        }

        return $res;
    }
}