<?php
namespace Jasper\LinkedList;
class Linklist
{

    public $head;     //头节点
    public $size;     // 长度

    public function __construct()
    {
        $this->head = new Node();
        $this->size = 0;
    }

    //头部插入
    public function addFirst($value)
    {
        $this->add(0,$value);
    }

    /**
     * 指定索引位置插入
     * @param $index
     * @param $value
     * @throws \Exception
     */
    public function add($index, $value)
    {
        if($index > $this->size) throw new \Exception('超过链表范围');
        //先获取头结点
        $prev = $this->head;

        for ($i=0;$i<$index;$i++){
            //循环遍历找到要插入位置的节点，所以这个时间复杂度为O(n)
            $prev = $prev->next;
        }

        //上一个节点的后驱指针要指向插入的节点
        $prev->next = new Node($value,$prev->next);

        //修改链表的长度
        $this->size++;
    }


    public function addLast($value){
        $this->add($this->size,$value);
    }


    public function edit($index,$value)
    {
        if($index > $this->size-1) throw new \Exception('超过链表范围');
        //获取头结点的下一个节点
        $prev = $this->head->next;

        for ($i=0;$i<=$index;$i++){
            if($i==$index){
                $prev->val = $value;
            }
            $prev = $prev->next;
        }
    }


    public function select($index){
        if($index > $this->size-1) throw new \Exception('超过链表范围');
        $prev = $this->head->next;
        for($i=0;$i<=$index;$i++){
            if($i==$index) return $prev;
            $prev = $prev->next;
        }
        return -1;
    }


    public function delete($index)
    {
        if($index > $this->size-1) throw new \Exception('超过链表范围');

        $prev = $this->head;
        for($i=0;$i<=$index;$i++){
            if($i==$index) $prev->next = $prev->next->next;
            $prev = $prev->next;
        }
        $this->size--;
    }


    public function iscontain($value){
        $prev = $this->head->next;
        while($prev){
            if($prev->val==$value){
                return true;
            }
            $prev = $prev->next;
        }
        return false;
    }


    public function removeFileds($value){
        $prev = $this->head;
        while ($prev->next){
            if($prev->val == $value){
                $prev->val = $prev->next->val;
                $prev->next=$prev->next->next;
            }else{
                $prev = $prev->next;
            }
        }
    }


    public function removeFieldsByRecursion($value){
        $this->head = $this->removeByRecursion($this->head,$value);
        return $this->head;
    }

    public function removeByRecursion($node,$value,$level=0){
        if($node->next == null){
            $this->showDeep($level,$node->val);
            return $node->val == $value ? $node->next:$node;
        }
        $this->showDeeep($level,$node->val);
        $node->next = $this->removeByRecursion( $node->next,$value,++$level );
        $this->showDeeep($level,$node->val);
        return $node->val == $value ? $node->next:$node;

    }

    public function showDeep( $level=1,$val ){
        if( $level<1 ){
            return false;
        }

        while($level--){
            echo '-';
        }
        echo "$val\n";
    }

    public function __toString()
    {
        $prev = $this->head->next;
        $r = [];
        while($prev){
            $r[]=$prev->val;
            $prev = $prev->next;
        }
        return implode('->',$r);
    }


    public function reverseList()
    {
        if($this->head == NULL || $this->head->next ==null){
            return $this->head;
        }
        $prev = null;
        $cur = $this->head->next;
        while ($cur) {
            // save next
            $next = $cur->next;
            // move cur to head
            $this->head->next = $cur;
            $cur->next = $prev;
            // iterate
            $prev = $cur;
            $cur = $next;
        }

    }

}
