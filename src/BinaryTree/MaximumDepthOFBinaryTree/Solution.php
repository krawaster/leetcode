<?php 
/**
 * https://leetcode.com/problems/maximum-depth-of-binary-tree/description/
 */
namespace BinaryTree\MaximumDepthOFBinaryTree;

$node2 = new TreeNode(2);
$node3 = new TreeNode(3,null, $node2);
$root = new TreeNode(1, $node3);

$res = (new Solution())->maxDepth($root);
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
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) {
            return 0;
        }
        
        $left = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);


        $max = max($left, $right) + 1;

        return $max;
    }
}