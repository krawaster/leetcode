<?php

namespace LinkedList\AddTwoNumbers;

$list3 = new ListNode(3);
$list4 = new ListNode(4, $list3);
$list1 = new ListNode(2, $list4);

$list44 = new ListNode(4);
$list6 = new ListNode(6, $list44);
$list2 = new ListNode(5, $list6);

$result = (new Solution())->addTwoNumbers($list1, $list2);

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $tmp = new ListNode(0);
        $cur = $tmp;
        $carry = 0;

        while($l1 != null || $l2 != null || $carry != 0) {
            $x = ($l1 != null) ? $l1->val : 0;
            $y = ($l2 != null) ? $l2->val : 0;
            $sum = $carry + $x + $y;
            $carry = floor($sum/10);

            $cur->next = new ListNode($sum % 10);
            $cur = $cur->next;
            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }

        return $tmp->next;
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