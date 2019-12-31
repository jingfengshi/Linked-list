<?php

require_once './vendor/autoload.php';
use Jasper\LinkedList\Linklist;
$list = new Linklist();

$list->addFirst(1);
$list->add(1,7);
$list->add(2,10);
$list->edit(1,8);
echo $list->select(1);
$list->delete(1);
$list->addLast(99);
var_dump($list->iscontain(2));
echo $list;
