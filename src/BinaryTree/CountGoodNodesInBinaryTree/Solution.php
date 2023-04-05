<?php

namespace BinaryTree\CountGoodNodesInBinaryTree;

$node3 = new TreeNode(3);
$node11 = new TreeNode(1, $node3);
$node12 = new TreeNode(1);
$node5 = new TreeNode(5);
$node4 = new TreeNode(4, $node12, $node5);
$root = new TreeNode(1, $node11, $node4);

$result = (new Solution())->goodNodes($root);
$test = 1;

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * https://leetcode.com/problems/count-good-nodes-in-binary-tree/
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function goodNodes($root) {
        $count = 0;
        $queue = [];
        $queue[] = ['cur' => $root, 'max' => PHP_INT_MIN];

        while($queue) {
            $cur = array_shift($queue);

            if ($cur['max'] <= $cur['cur']->val) {
                $count++;
            }

            if ($cur['cur']->left != null) {
                $queue[] = ['cur' => $cur['cur']->left, 'max' => max($cur['cur']->val, $cur['max'])];
            }

            if ($cur['cur']->right != null) {
                $queue[] = ['cur' => $cur['cur']->right, 'max' => max($cur['cur']->val, $cur['max'])];
            }
        }

        return $count;
    }
}