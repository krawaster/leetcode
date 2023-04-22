<?php

namespace Tree\ValidateBinarySearchTree;

$nodeMinusOne = new TreeNode(-1);
$root = new TreeNode(0, null, $nodeMinusOne);

$result = (new Solution())->isValidBST($root);
$stop = 1;

/**
 * https://leetcode.com/problems/validate-binary-search-tree/
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        return $this->validate($root, null, null);
    }

    function validate($root, $low, $high) {
        if ($root === null) {
            return true;
        }

        if (($low !== null && $root->val <= $low) || ($high !== null && $root->val >= $high)) {
            return false;
        }

        return $this->validate($root->right,$root->val, $high) && $this->validate($root->left,$low, $root->val);
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