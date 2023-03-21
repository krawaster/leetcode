<?php

namespace LinkedList\RemoveNodesFromLinkedList;


$node5 = new ListNode(8);
$node4 = new ListNode(3, $node5);
$node3 = new ListNode(13, $node4);
$node2 = new ListNode(2, $node3);
$node1 = new ListNode(5, $node2);
$result = (new Solution())->removeNodes($node1);


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * https://leetcode.com/problems/remove-nodes-from-linked-list/
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeNodes($head) {
        if (!$head) {
            return $head;
        }

        $head = $this->reverse($head);
        $max = $head->val;
        $curr = $head;

        while($curr && $curr->next) {
            if ($max > $curr->next->val){
                $curr->next = $curr->next->next;
            } else {
                $curr = $curr->next;
                $max = $curr->val;
            }
        }

        return $this->reverse($head);

    }

    private function reverse($head) {
        $prev = null;
        while($head) {
            $tmp = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $tmp;
        }

        return $prev;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeNodesRecurcion($head) {
        if (!$head) {
            return null;
        }

        $head->next = $this->removeNodes($head->next);
        return $head->next && $head->val < $head->next->val ? $head->next : $head;

    }
}