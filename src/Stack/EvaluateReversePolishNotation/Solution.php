<?php

namespace Stack\EvaluateReversePolishNotation;

$tokens = ["2","1","+","3","*"];
$tokens = ["4","13","5","/","+"];
$tokens = ["18"];
$tokens = ["3","11","5","+","-"];
$tokens = ["3","11","+","5","-"];
$result = (new Solution())->evalRPN($tokens);
$stop = 1;

class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $operators = [
            '+' => '+',
            '-' => '-',
            '*' => '*',
            '/' => '/'
        ];
        $result = [];
        $stack = [];
        $data = 0;

        for ($i = 0; $i < count($tokens); $i++){
            if (!isset($operators[$tokens[$i]])) {
                array_push($stack,$tokens[$i]);
            } else {
                $action = $tokens[$i];
                if (count($stack) > 1) {
                    $operand1 = array_pop($stack);
                    $operand2 = array_pop($stack);
                    $data = $this->action($action, $operand2, $operand1);
                } else {
                    $operand = array_pop($stack);
                    $data = $this->action($action, $operand, $data);
                }
            }
        }

        if (count($stack) == 1) {
            return array_pop($stack);
        }

        return $data;
    }

    private function action($action, $v1, $v2){
        if ($action == '+') {
            $result = $v1 + $v2;
        }elseif ($action == '-') {
            $result = $v1 - $v2;
        }elseif ($action == '*') {
            $result = floor($v1 * $v2);
        }elseif ($action == '/') {
            $result = floor($v1 / $v2);
        }

        return $result;
    }
}