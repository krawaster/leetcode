<?php

namespace LinkedList\MergeTwoSortedLists;

$list14 = new ListNode(4);
$list12 = new ListNode(2, $list14);
$list1 = new ListNode(1, $list12);

$list24 = new ListNode(4);
$list23 = new ListNode(3, $list24);
$list2 = new ListNode(1, $list23);

$result = (new Solution())->mergeTwoLists($list1, $list2);
$stop = 'stop';

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * https://leetcode.com/problems/merge-two-sorted-lists/
 */
class Solution
{
    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        if (empty($list1)) {
            return $list2;
        } else if (empty($list2)) {
            return $list1;
        } else if ($list1->val < $list2->val){
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        } else {
            $list2->next = $this->mergeTwoLists($list1, $list2->next);
            return $list2;
        }
    }
}