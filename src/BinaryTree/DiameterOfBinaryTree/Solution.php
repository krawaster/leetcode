<?php

namespace BinaryTree\DiameterOfBinaryTree;

$node5 = new TreeNode(5);
$node4 = new TreeNode(4);
$node3 = new TreeNode(3);
$node2 = new TreeNode(2, $node4, $node5);
$root = new TreeNode(1, $node2, $node3);

(new Solution())->diameterOfBinaryTree($root);

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
 * https://leetcode.com/problems/diameter-of-binary-tree/
 */
class Solution {

    public $diameter = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {

        $this->longestPath($root);
        return $this->diameter;
    }

    function longestPath($root){
        if ($root == null) {
            return 0;
        }
        $leftPath = $this->longestPath($root->left);
        $rightPath = $this->longestPath($root->right);

        $this->diameter = max($this->diameter, $leftPath + $rightPath);

        return max($leftPath, $rightPath) + 1;
    }
}