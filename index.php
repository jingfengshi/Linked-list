<?php

require_once './vendor/autoload.php';
use Jasper\LinkedList\Linklist;
$list = new Linklist();

$list->addFirst(1);
$list->add(1,7);
$list->add(2,10);
echo $list;
