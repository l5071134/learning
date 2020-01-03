<?php
include dirname(__DIR__).'/vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$route = new RouteCollection();

$route->add('hello',new Route('/hello/{name}',array('name'=>'World')));
$route->add('bye',new Route('/bye'));


