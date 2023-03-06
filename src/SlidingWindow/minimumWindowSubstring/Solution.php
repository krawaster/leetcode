<?php

namespace SlidingWindow\minimumWindowSubstring;

class Solution
{
    public function __construct()
    {
        $this->minWindow('s', 'w');
        echo "test";
    }


    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        $arrayS = str_split($s);
        $arrayT = str_split($t);

        $find = [];
        $result = [];
        $resultString = [];
        $string = '';
        for ($i = 0; $i < count($arrayS); $i++) {
            if (in_array($arrayS[$i], $arrayT)) {
                print $arrayS[$i] . "\n";
                $result[] = $arrayS[$i];
                $find[$arrayS[$i]] = $arrayS[$i];
                $string = $string . $arrayS[$i];
                if (count($arrayT) == count($find)) {
                    print $string;
                    $resultString[] = $string;
                }
            }

            $result[] = $arrayS[$i];
        }

        //var_dump($result);die;
        return '';
    }
}