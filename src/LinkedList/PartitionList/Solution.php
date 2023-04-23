<?php

namespace LinkedList\PartitionList;

$list2 = new ListNode(2);
$list5 = new ListNode(5, $list2);
$list22 = new ListNode(2, $list5);
$list3 = new ListNode(3, $list22);
$list4 = new ListNode(4, $list3);
$root = new ListNode(1, $list4);
$data = (new Solution())->partition($root, 3);
$stop = 1;

/**
 * https://leetcode.com/problems/partition-list/
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        $before_head = new ListNode(0);
        $before = $before_head;
        $after_head = new ListNode(0);
        $after = $after_head;
        $out = [];
        while($head) {
            if ($head->val < $x) {
                $before->next = $head;
                $before = $before->next;
            } else {
                $after->next = $head;
                $after = $after->next;
            }
            $head = $head->next;
        }

        $after->next = null;

        $before->next = $after_head->next;
        return $before_head->next;
    }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}