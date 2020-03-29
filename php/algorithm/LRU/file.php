<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-03-28
 * Time: 15:10
 */

class Node{
    public $key;
    public $val;

    public $prev;
    public $next;

    public function __construct($key,$val)
    {
        $this->key = $key;
        $this->val = $val;

    }
}

class HashDoubleList implements Iterator {
    private $_size;
    private $_head;
    private $_last;
    private $_hash_map;

    private $_current_node ;

    public function __construct()
    {
        $this->_head = null;
        $this->_last = null;
        $this->_current_node = null;
    }

    public function addFirst(Node $node){
        if($this->_head == null){
            $this->_head = $node;
            $this->_last = $node;
            $this->_head->prev = null;
            $this->_head->next = null;
        }else{
            if(isset($this->_hash_map[$node->key])){
                $old_node = $this->_hash_map[$node->key];
                $this->remove($old_node);

            }
            $this->_head->prev = $node;
            $node->next = $this->_head;
            $node->prev = null;
            $this->_head = $node;
            $this->_hash_map[$node->key] = $node;
        }
        $this->_size++;
    }

    public function remove(Node $x){
        if(isset($this->_hash_map[$x->key])){
            $prev = $this->_hash_map[$x->key]->prev;
            $next = $this->_hash_map[$x->key]->next;


            if(null == $prev){
                $this->_head = $this->_hash_map[$x->key]->next;
            }

            if(null == $next){
                $this->_last = $this->_hash_map[$x->key]->prev;
            }
            var_dump($this->_hash_map[$x->key]->next);
//
//            if(null != $prev && null != $next){
//                $prev->next = $next;
//            }
            $prev->next = $next;
            $next->prev = $prev;
            unset($this->_hash_map[$x->key]);
            $this->_size--;
        }else{
            throw  new Exception('不存在的节点');
        }
    }


    public function removeLast(){
        if(null == $this->_last ){
            return false;
        }else{
            $node = $this->_last;
            if(null == $node->prev){
                $this->_head = null;
                $this->_last = null;
            }else{
                $node->prev->next = null;
                $this->_last = $node->prev;
            }
            $this->_size --;

            return $node;
        }
    }

    public function size(){
        return $this->_size;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->_current_node;
        // TODO: Implement current() method.
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        return $this->_current_node = $this->_current_node->next;
        // TODO: Implement next() method.
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->_current_node->key;
        // TODO: Implement key() method.
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return !empty($this->_current_node);
        // TODO: Implement valid() method.
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->_current_node = $this->_head;
        // TODO: Implement rewind() method.
    }
}


class LRUCache{
    private $_map;
    private $_cache;
    private $_cap;

    public function __construct($capacity)
    {
        $this->_cap = $capacity;
        $this->_map = [];
        $this->_cache = new HashDoubleList();
    }

    public function get($key){
        if(!isset($this->_map[$key])){
            return -1;
        }
        $node = $this->_map[$key];
        $this->_cache->remove($node);
        $this->_cache->addFirst($node);
        return $node->val;
    }

    public function put($key,$val){
        $node = new Node($key,$val);
        if(isset($this->_map[$key])){
            $this->_cache->remove($node);
        }else{
            if($this->_cache->size() >= $this->_cap){
                $last = $this->_cache->removeLast();
                unset($this->_map[$last->key]);
            }
        }
        $this->_map[$key] = $node;
        $this->_cache->addFirst($node);
    }

    public function cacheSize(){
        return $this->_cache->size();
    }


    public function dumpCache(){
        foreach ($this->_cache as $key => $value){
            var_dump($key .' => '.$value->val);
        }
    }
}

//$nodelist = new HashDoubleList();
//$nodelist->addFirst(new Node(1,'1'));
//$nodelist->addFirst(new Node(2,'2'));
//$nodelist->addFirst(new Node(3,'3'));
//$nodelist->addFirst(new Node(4,'4'));
//
//$nodelist->remove(new Node(3,'3'));
//$nodelist->remove(new Node(2,'2'));
//$nodelist->removeLast();
//var_dump($nodelist->size());
//foreach ($nodelist as $key => $value){
//    var_dump($value->val);
//}

$lru = new LRUCache(3);
$lru->put(1,1);
$lru->put(2,2);
$lru->put(3,3);
$lru->put(4,4);
$lru->put(5,5);

var_dump($lru->cacheSize());
$lru->dumpCache();