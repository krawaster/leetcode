<?php

namespace BinaryTree\SameTree;

$node3 = new TreeNode(3);
$node2 = new TreeNode(2);
$tree1 = new TreeNode(1, $node2, $node3);
$tree2 = new TreeNode(1, $node2, $node3);

$result = (new Solution())->isSameTree($tree1, $tree2);
$test = 1;

/**
 * https://leetcode.com/problems/same-tree/
 */
class Solution {

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        $queue = [];
        $queue[] = ['p' => $p, 'q' => $q];
        while ($queue) {
            $cur = array_shift($queue);

            if (false === $this->check($cur['p'], $cur['q'])){
                return false;
            }

            if (isset($cur['p'])) {
                if (false === $this->check($cur['p']->left, $cur['q']->left)){
                    return false;
                }

                if (null != $cur['p']->left) {
                    $queue[] = ['p' => $cur['p']->left, 'q' => $cur['q']->left];
                }

                if (false === $this->check($cur['p']->right, $cur['q']->right)){
                    return false;
                }

                if (null != $cur['p']->right) {
                    $queue[] = ['p' => $cur['p']->right, 'q' => $cur['q']->right];
                }
            }

        }

        return true;
    }

    function check($p, $q){
        if ($p === null && $q === null) {
            return true;
        }

        if ($p === null || $q === null) {
            return false;
        }

        if ($p->val != $q->val) {
            return false;
        }

        return true;
    }
}

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