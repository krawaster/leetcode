<?php

namespace BinaryTree\BalancedBinaryTree;

//$node9 = new TreeNode(9);
//$node15 = new TreeNode(15);
//$node7 = new TreeNode(7);
//$node20 = new TreeNode(20, $node15, $node7);
//$root = new TreeNode(3, $node9, $node20);
//
//$result = (new Solution())->isBalanced($root);


$node41 = new TreeNode(4);
$node42 = new TreeNode(4);
$node31 = new TreeNode(3, $node41, $node42);
$node32 = new TreeNode(3);
$node21 = new TreeNode(2, $node31, $node32);
$node22 = new TreeNode(2);
$root = new TreeNode(1, $node21, $node22);

$result = (new Solution())->isBalanced($root);
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
 * https://leetcode.com/problems/balanced-binary-tree/
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        if ($root === null) {
            return true;
        }

        $leftPath = $this->height($root->left);
        $rightPath = $this->height($root->right);

        $diff = abs($leftPath - $rightPath);
        return $diff < 2
            && $this->isBalanced($root->left)
            && $this->isBalanced($root->right);

    }

    function height($node) {
        if ($node == null) {
            return -1;
        }

        $leftPath = $this->height($node->left);
        $rightPath = $this->height($node->right);

        return max($leftPath, $rightPath) + 1;
    }
}