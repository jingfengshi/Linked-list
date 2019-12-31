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
        //前驱指针 为当前节点的上一个节点。
        $prev = $this->head;

        for ($i=0;$i<$index;$i++){
            //循环遍历找到上一个节点，所以这个时间复杂度为O(1)
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

}
