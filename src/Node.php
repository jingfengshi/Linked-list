<?php
namespace Jasper\LinkedList;
/**
 * 节点类
 * Class Node
 */
class Node
{
    public $val;
    public $next;

    public function __construct($val = null , $next = null)
    {
        $this->val =$val;
        $this->next = $next;
    }
}
