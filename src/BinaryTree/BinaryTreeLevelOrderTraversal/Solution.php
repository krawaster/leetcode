<?php

namespace BinaryTree\BinaryTreeLevelOrderTraversal;

$node7 = new TreeNode(7);
$node15 = new TreeNode(15);
$node9 = new TreeNode(9);
$node20 = new TreeNode(20, $node15, $node7);
$root = new TreeNode(3, $node9, $node20);

(new Solution())->levelOrder($root);

/**
 * https://leetcode.com/problems/binary-tree-level-order-traversal/
 */
class Solution {
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        $queue = [];
        $queue[] = $root;
        $levels = [];
        $level = 0;
        while($queue) {
            $length = count($queue);
            for ($i=0;$i < $length; $i++){
                $node = array_shift($queue);
                if ($node != null){
                    $levels[$level][] = $node->val;
                    if ($node->left != null) {
                        $queue[] = $node->left;
                    }

                    if ($node->right != null) {
                        $queue[] = $node->right;
                    }
                }
            }
            $level++;
        }

        return $levels;
    }
}

class Solution1 {
    private $levels = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if ($root == null) {
            return $this->levels;
        }

        $this->addLevelData($root, 0);
        return $this->levels;
    }

    function addLevelData($node, $level){
        $this->levels[$level][] = $node->val;
        if ($node->left != null) {
            $this->addLevelData($node->left, $level + 1);
        }
        if ($node->right != null) {
            $this->addLevelData($node->right, $level + 1);
        }
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