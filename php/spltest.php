<?php
/**
 * Created by PhpStorm.
 * User: Macintosh
 * Date: 2020-01-20
 * Time: 09:54
 */
$a = "new string";
$b = $a;
xdebug_debug_zval( 'a' );
xdebug_debug_zval( 'b' );


class Foo
{
    public $var = '3.1415962654';
    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }
    public static function __set_state($an_array)
    {
        // TODO: Implement __set_state() method.
    }
}



$baseMemory = memory_get_usage();

for ( $i = 0; $i <= 1000; $i++ )
{
    $a = new Foo;
    $a->self = $a;
    if ( $i % 500 === 0 )
    {
        var_dump(gc_collect_cycles());
    }
}

session_cache_expire();
session_set_cookie_params();

$maxheap = new SplMaxHeap();
$minheep = new SplMinHeap();
$queue = new SplPriorityQueue();
$queue = new SplQueue();
$queue = new SplStack();


