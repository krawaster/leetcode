<?php
namespace BinaryTree\PathSum;
/**
 * https://leetcode.com/problems/path-sum/
 */


$node5 = new TreeNode(2);
$node4 = new TreeNode(7);
$node3 = new TreeNode(11, $node4, $node5);
$node2 = new TreeNode(4, $node3, null);
$node8 = new TreeNode(1, null, null);
$node7 = new TreeNode(4, null, $node8);
$node6 = new TreeNode(13, null, null);
$node9 = new TreeNode(8, $node6, $node7);

$root = new TreeNode(5, $node2, $node9);

$res = (new Solution())->hasPathSum($root, 22);
$stop = 1;


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
 
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        $max = $this->dfs($root,$targetSum, 0);

        return $max;
    }
    function dfs($root, $targetSum, $cur) {
        if ($root == null) {
            return false;
        }

        $cur = $root->val + $cur;
        if ($root->left == null && $root->right == null){
            if ($cur == $targetSum) {
                return true;
            }
        }

        $left = $this->dfs($root->left, $targetSum, $cur);
        $right = $this->dfs($root->right, $targetSum, $cur);

        return ($left || $right);
    }
}