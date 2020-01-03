<?php
include './vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::create('/index.php?name=Fabien');
$response = new Response();
$response->setContent('Hello World!'.$request->getClientIp(true));
$response->setStatusCode(200);
$response->headers->set('Content-Type','text/html');

$response->setMaxAge(10);

$response->send();