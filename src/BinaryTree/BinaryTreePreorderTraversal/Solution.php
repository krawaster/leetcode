<?php

namespace BinaryTree\BinaryTreePreorderTraversal;

$node3 = new TreeNode(3);
$node2 = new TreeNode(2, $node3);
$root = new TreeNode(1, null, $node2);

(new Solution())->preorderTraversal($root);

/**
 * https://leetcode.com/problems/binary-tree-preorder-traversal/
 */
class Solution {
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $answer = [];
        $stack = [];
        $stack[] = $root;

        while($stack){
            $cur = array_pop($stack);
            if ($cur != null) {
                $answer[] = $cur->val;
                $stack[] = $cur->right;
                $stack[] = $cur->left;
            }
        }

        return $answer;
    }
}

class Solution1 {

    private $answer = [];
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $this->dfs($root);
        return $this->answer;
    }

    function dfs($node){
        if ($node == null) {
            return;
        }

        $this->answer[] = $node->val;
        $this->dfs($node->left);
        $this->dfs($node->right);
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