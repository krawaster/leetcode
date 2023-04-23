<?php

namespace Stack\MinimumRemovetoMakeValidParentheses;

$s = 'a)b(c)d';
(new Solution())->minRemoveToMakeValid($s);

/**
 * https://leetcode.com/problems/minimum-remove-to-make-valid-parentheses/
 */
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s) {
        $chars = str_split($s);
        $stack = [];
        $toRemove = [];
        foreach($chars as $key => $char){
            if ($char == '(') {
                $stack[$key] = $key;
            } else if ($char == ')' && empty($stack)) {
                $toRemove[$key] = $key;
            } else if ($char == ')' && !empty($stack)) {
                array_pop($stack);
            }
        }

        $dataToRemove = array_merge($stack, $toRemove);
        foreach($dataToRemove as $key) {
            unset($chars[$key]);
        }

        return implode('',$chars);
    }
}