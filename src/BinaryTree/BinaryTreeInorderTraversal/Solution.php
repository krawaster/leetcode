<?php

namespace BinaryTree\BinaryTreeInorderTraversal;

$node3 = new TreeNode(3);
$node2 = new TreeNode(2, $node3);
$root = new TreeNode(1, null, $node2);

(new Solution())->inorderTraversal($root);

/**
 * https://leetcode.com/problems/binary-tree-inorder-traversal/
 */
class Solution {
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $answer = [];
        $stack = [];
        $cur = $root;

        while($cur != null || !empty($stack)){
            while($cur) {
                $stack[] = $cur;
                $cur = $cur->left;
            }

            $cur = array_pop($stack);
            $answer[] = $cur->val;
            $cur = $cur->right;
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
    function inorderTraversal($root) {
        $this->dfs($root);
        return $this->answer;
    }

    function dfs($node){
        if ($node == null){
            return;
        }

        $this->dfs($node->left);
        $this->answer[] = $node->val;
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