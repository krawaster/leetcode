<?php

namespace LinkedList\ReverseLinkedList;

$node5 = new ListNode(5,null);
$node4 = new ListNode(4, $node5);
$node3 = new ListNode(3, $node4);
$node2 = new ListNode(2, $node3);
$node1 = new ListNode(1, $node2);
$result = (new Solution())->reverseList($node1);

/**
 * https://leetcode.com/problems/reverse-linked-list/
 */
class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
 }

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        $prev = null;
        $current = $head;
        while ($head || $current->next) {
            $nextTemp = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $nextTemp;
        }

        return $prev;
    }
}