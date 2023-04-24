<?php

namespace BinaryTree\RecoverBinarySearchTree;

$node2 = new TreeNode(2);
$node3 = new TreeNode(3,null, $node2);
$root = new TreeNode(1, $node3);

(new Solution())->recoverTree($root);


/**
 * https://leetcode.com/problems/recover-binary-search-tree/
 */
class Solution {

    private array $data = [];
    /**
     * @param TreeNode $root
     * @return NULL
     */
    function recoverTree($root): void
    {
        $this->bfs($root);
        $sorted = [];
        foreach($this->data as $node){
            $sorted[] = $node->val;
        }
        sort($sorted);

        for($i=0; $i < count($sorted); $i++){
            $this->data[$i]->val = $sorted[$i];
        }

    }

    function bfs($node){
        if ($node === null){
            return;
        }
        $this->bfs($node->left);
        $this->data[] = $node;
        $this->bfs($node->right);
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